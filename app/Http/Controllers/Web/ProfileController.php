<?php

namespace App\Http\Controllers\Web;

use App\Models\City;
use App\Models\CompanyProfile;
use App\Models\EducationLevel;
use App\Models\State;
use App\Models\User;
use App\Models\Visa;
use App\Services\CompanyProfileService;
use App\Services\CountryService;
use Illuminate\Http\Request;
use App\Helpers\ArrayHelper;


class ProfileController extends \App\Http\Controllers\Controller
{

    public function edit(Request $request,CountryService $countryService)
    {
        $data = [];

        $user = User::find(session('user_id'));
        $data['user'] = $user;
        //dd($user);
        $response = $countryService->getCountries();
        $countries = $this->checkErrors($response);
        $data['countries'] = $countries['countries'];
        $data['states'] = State::all();
        $data['city'] = City::find($user->city_id);
        $data['visas'] = Visa::all();
        $data['educationLevels'] = EducationLevel::all();
        if($user->license_plates == " "){
            $user->license_plates = "";
        }

        //dd($data);
        return view('profile.edit', $data);
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

    public function create_company_profile(Request $request, CompanyProfileService $companyService)
    {
        // dd($request->input());
        if (session('employer')) {
            $request->request->add(['user_id' => session('user_id')]);
        }

        $response = $companyService->create($request->all());
        //dd($response);
        if (array_key_exists('error', $response)) {
            return redirect()->back()->withErrors($response['errors'])->withInput();
        }

        return redirect()->route('web.company.create', $response['data']['id']);
    }

    public function edit_company_profile(Request $request, CompanyProfileService $companyService)
    {
        $company = CompanyProfile::find($request->input('id'));
        if ($company) {
            $company->fill($request->all());
            $company->save();
            return redirect()->route('web.company.create', $company->id);
        }
        return redirect()->route('web.company.create');
    }


}