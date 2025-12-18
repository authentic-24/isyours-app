<?php

namespace App\Http\Controllers\Web;

// use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\CountryService;
use App\Services\OfferService;
use App\Helpers\ArrayHelper;
use App\Http\Controllers\JobOfferController;
use App\Models\User;
use App\Models\JobOffer;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;



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

        // Check if user is logged in
        if (!session('user_id')) {
            // Show public home page with latest offers
            try {
                $startTime = microtime(true);
                $response = $offerService->getLatestOffers();
                $endTime = microtime(true);
                $executionTime = ($endTime - $startTime) * 1000;

                \Log::info('Offer service response', [
                    'response' => $response,
                    'execution_time' => $executionTime . 'ms'
                ]);

                if (isset($response['error'])) {
                    throw new \Exception($response['message']);
                }

                $result = ArrayHelper::arrayToObject($response);
                $data['latest_offers'] = $result;

                return view('home/index', $data);
            } catch (\Exception $e) {
                \Log::error('Exception in home method', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                return view('home/index', ['latest_offers' => []]);
            }
        }

        // Redirect to appropriate dashboard based on user role
        if (session('admin')) {
            return $this->adminDashboard();
        } elseif (session('employer')) {
            return $this->employerDashboard();
        } else {
            return $this->candidateDashboard();
        }
    }

    /**
     * Admin Dashboard
     */
    private function adminDashboard()
    {
        $data = [];

        // Total statistics
        $data['total_users'] = User::count();
        $data['total_candidates'] = User::whereDoesntHave('company')->count();
        $data['total_employers'] = User::whereHas('company')->count();
        $data['total_offers'] = JobOffer::count();
        $data['active_offers'] = JobOffer::where('expiration_date', '>', now())->count();
        $data['expired_offers'] = JobOffer::where('expiration_date', '<=', now())->count();
        $data['total_applications'] = DB::table('job_offer_user')->count();

        // Recent users (last 10)
        $data['recent_users'] = User::orderBy('created_at', 'desc')->take(10)->get();

        // Recent offers (last 10)
        $data['recent_offers'] = JobOffer::with(['company', 'jobTitle', 'jobLevel', 'city'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Applications per month (last 6 months)
        $data['monthly_applications'] = DB::table('job_offer_user')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Top companies by offers
        $data['top_companies'] = CompanyProfile::withCount('jobOffers')
            ->orderBy('job_offers_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard/admin', $data);
    }

    /**
     * Employer Dashboard
     */
    private function employerDashboard()
    {
        $user = User::find(session('user_id'));
        $company = $user->company;

        $data = [];
        $data['user'] = $user;
        $data['company'] = $company;

        if ($company) {
            // Company statistics
            $data['total_offers'] = JobOffer::where('company_id', $company->id)->count();
            $data['active_offers'] = JobOffer::where('company_id', $company->id)
                ->where('expiration_date', '>', now())
                ->count();
            $data['expired_offers'] = JobOffer::where('company_id', $company->id)
                ->where('expiration_date', '<=', now())
                ->count();

            // Total applications to all company offers
            $data['total_applications'] = DB::table('job_offer_user')
                ->join('job_offers', 'job_offer_user.job_offer_id', '=', 'job_offers.id')
                ->where('job_offers.company_id', $company->id)
                ->count();

            // Recent offers
            $data['recent_offers'] = JobOffer::where('company_id', $company->id)
                ->with(['jobTitle', 'jobLevel', 'city', 'users'])
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            // Recent applications
            $data['recent_applications'] = DB::table('job_offer_user')
                ->join('job_offers', 'job_offer_user.job_offer_id', '=', 'job_offers.id')
                ->join('users', 'job_offer_user.user_id', '=', 'users.id')
                ->where('job_offers.company_id', $company->id)
                ->select('users.*', 'job_offer_user.created_at as applied_at', 'job_offers.id as offer_id')
                ->orderBy('job_offer_user.created_at', 'desc')
                ->take(10)
                ->get();

            // Offers with most applications
            $data['popular_offers'] = JobOffer::where('company_id', $company->id)
                ->withCount('users')
                ->orderBy('users_count', 'desc')
                ->take(5)
                ->get();
        }

        return view('dashboard/employer', $data);
    }

    /**
     * Candidate Dashboard
     */
    private function candidateDashboard()
    {
        $user = User::with(['jobOffers'])->find(session('user_id'));

        $data = [];
        $data['user'] = $user;

        // Applications statistics
        $data['total_applications'] = $user->jobOffers()->count();
        $data['recent_applications'] = $user->jobOffers()
            ->with(['company', 'jobTitle', 'jobLevel', 'city'])
            ->orderBy('job_offer_user.created_at', 'desc')
            ->take(5)
            ->get();

        // Recommended jobs (matching user's education level)
        $data['recommended_jobs'] = JobOffer::with(['company', 'jobTitle', 'jobLevel', 'city'])
            ->where('expiration_date', '>', now())
            ->when($user->education_level_id, function ($query) use ($user) {
                return $query->where('education_level_id', $user->education_level_id);
            })
            ->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Latest jobs (not applied)
        $data['latest_jobs'] = JobOffer::with(['company', 'jobTitle', 'jobLevel', 'city'])
            ->where('expiration_date', '>', now())
            ->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('dashboard/candidate', $data);
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
