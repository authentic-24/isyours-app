<?php

namespace App\Http\Controllers\Web;

use App\Models\CompanyProfile;
use App\Models\User;
use App\Services\CompanyProfileService;
use App\Services\CountryService;
use App\Services\EducationLevelService;
use App\Services\ProficiencyLevelService;
use App\Services\JobLevelService;
use App\Services\JobTitleService;
use App\Services\JobTypeService;
use App\Services\LanguageService;
use Illuminate\Http\Request;
use App\Services\OfferService;
use App\Helpers\ArrayHelper;

class CompanyController extends \App\Http\Controllers\Controller
{

    public function create(Request $request, CompanyProfileService $companyService)
    {
        if (session('employer')) {
            $user = User::find(session('user_id'));
            if (is_null($user->company)) {
                return view('company.create');
            } else {
                return view('company.create', ['company' => $user->company]);
            }
        }
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