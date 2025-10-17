<?php

namespace App\Http\Controllers\Web;

// use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\CountryService;
use App\Services\OfferService;
use App\Helpers\ArrayHelper;
use App\Http\Controllers\JobOfferController;



class HomeController extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(OfferService $offerService)
    {

        \Log::info('Home method called');

        try {
            $startTime = microtime(true);
            $response = $offerService->getLatestOffers();
            $endTime = microtime(true);
            $executionTime = ($endTime - $startTime) * 1000; // in milliseconds

            \Log::info('Offer service response', [
                'response' => $response,
                'execution_time' => $executionTime . 'ms'
            ]);

            if (isset($response['error'])) {
                throw new \Exception($response['message']);
            }

            $result = ArrayHelper::arrayToObject($response);
            $data['latest_offers'] = $result;
            // dd($data['latest_offers']);

            return view('home/index', $data);
        } catch (\Exception $e) {
            \Log::error('Exception in home method', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return view('home/index', ['latest_offers' => []]);
        }
    }

    public function sitemap()
    {
        return view('home/sitemap');
    }

    public function about()
    {
        return view('home/about');
    }

    public function index()
    {
        // Return the view for your home page
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        return view('login/index');
    }

    public function register(CountryService $countryService)
    {
        $data = [];
        $response = $countryService->getCountries();
        $countries = $this->checkErrors($response);
        $data['countries'] = $countries['countries'];
        return view('register/index', $data);
    }

    public function checkErrors($response)
    {

        // Check for errors in response
        if (array_key_exists('error', $response)) {
            // Redirect to login page if there's an error
            return redirect()->route('web_login');
        }
        // Convert result to object
        foreach ($response as &$offer) {
            $offer = ArrayHelper::arrayToObject($offer);
        }
        $result = $response;
        return $result;
    }

    public function log_out(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('web_login');
    }


    public function login_post(Request $request, AuthService $authService)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            // Remove the following line completely
            // 'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $response = $authService->login($request->all());

        if (array_key_exists('error', $response)) {
            return redirect()->back()->withErrors(['msg' => $response['message']])->withInput();
        }

        if (array_key_exists('access_token', $response)) {
            session(['access_token' => $response['access_token']]);
            session(['token_type' => $response['token_type']]);
            session(['user_id' => $response['user']['id']]);
            session(['role_name' => $response['user']['role_name']]);
            if ($response['user']['role_name'] == 'admin') {
                session(['admin' => true]);
            } else if ($response['user']['role_name'] == 'employer') {
                session(['employer' => true]);
            }
            return redirect()->route('web.offer.index');
        }

        return redirect()->route('web_login');
    }

    public function register_post(Request $request, AuthService $authService)
    {
        //dd($request->input());
        $response = $authService->register($request->all());
        //dd($response);
        if (array_key_exists('error', $response)) {
            return redirect()->back()->withErrors($response['errors'])->withInput();
        }

        return redirect()->route('web_login')->with('message', $response['message']);
    }
}
