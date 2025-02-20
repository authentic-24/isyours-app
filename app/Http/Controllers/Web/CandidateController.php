<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\CandidateService;
use App\Helpers\ArrayHelper;

class CandidateController extends Controller
{
    
     /**
     * Show candidates index.
     */
    public function index(Request $request, CandidateService $candidateService)
    {
        // Get all offers
        $response = $candidateService->getCandidates();
        //dd($response);
        // Check for errors in response
        if (array_key_exists('error', $response)) {
            // Redirect to login page if there's an error
            return redirect()->route('web_login');
        }

        // Convert result to object
        foreach ($response as &$offer) {
            //$offer['candidate_count'] = count($offer['users']);
            $offer = ArrayHelper::arrayToObject($offer);
        }
        $result = $response;
        //dd($result);
        // Return view with offer object
        return view('candidates/index', ['candidates' => $result]);
    }

    public function update(Request $request) 
    {
        $user =  User::find(session('user_id'));

        //dd($request->all());
        $user->fill($request->all());
        if(is_null($user->visa_number)){
            $user->visa_number = " ";
        }
        if(is_null($user->license_plates)){
            $user->license_plates = " ";
        }
        $user->save();

        return redirect()->back();
    }

}
