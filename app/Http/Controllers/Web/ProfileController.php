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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class ProfileController extends \App\Http\Controllers\Controller
{

    public function edit(Request $request, CountryService $countryService)
    {
        $data = [];

        $user = User::with('workExperiences', 'talents')->find(session('user_id'));
        $data['user'] = $user;
        //dd($user);
        $response = $countryService->getCountries();
        $countries = $this->checkErrors($response);
        $data['countries'] = $countries['countries'];
        $data['states'] = State::all();
        $data['city'] = City::find($user->city_id);
        $data['visas'] = Visa::all();
        $data['educationLevels'] = EducationLevel::all();
        if ($user->license_plates == " ") {
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

    /**
     * Show change password form.
     */
    public function changePasswordForm()
    {
        $user = User::find(session('user_id'));

        if (!$user) {
            return redirect()->route('web_login');
        }

        return view('profile.change_password');
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request)
    {
        $user = User::find(session('user_id'));

        if (!$user) {
            return redirect()->route('web_login');
        }

        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', Password::min(8)->letters()->numbers(), 'confirmed'],
        ], [
            'current_password.required' => 'Current password is required',
            'new_password.required' => 'New password is required',
            'new_password.min' => 'New password must be at least 8 characters',
            'new_password.confirmed' => 'Password confirmation does not match',
        ]);

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');
    }

    /**
     * Store new work experience.
     */
    public function storeWorkExperience(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string|max:1000',
        ]);

        $validated['user_id'] = session('user_id');

        if ($request->has('is_current') && $request->is_current) {
            $validated['end_date'] = null;
        }

        \App\Models\WorkExperience::create($validated);

        return redirect()->back()->with('success', 'Work experience added successfully!');
    }

    /**
     * Update work experience.
     */
    public function updateWorkExperience(Request $request, $id)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($request->has('is_current') && $request->is_current) {
            $validated['end_date'] = null;
        }

        $experience = \App\Models\WorkExperience::where('user_id', session('user_id'))->findOrFail($id);
        $experience->update($validated);

        return redirect()->back()->with('success', 'Work experience updated successfully!');
    }

    /**
     * Delete work experience.
     */
    public function destroyWorkExperience($id)
    {
        $experience = \App\Models\WorkExperience::where('user_id', session('user_id'))->findOrFail($id);
        $experience->delete();

        return redirect()->back()->with('success', 'Work experience deleted successfully!');
    }

    /**
     * Store new talent.
     */
    public function storeTalent(Request $request)
    {
        $validated = $request->validate([
            'talent' => 'required|string|max:50',
        ]);

        $validated['user_id'] = session('user_id');

        // Check if talent already exists for this user
        $exists = \App\Models\UserTalent::where('user_id', $validated['user_id'])
            ->where('talent', $validated['talent'])
            ->exists();

        if (!$exists) {
            \App\Models\UserTalent::create($validated);
            return redirect()->back()->with('success', 'Talent added successfully!');
        }

        return redirect()->back()->with('error', 'This talent already exists!');
    }

    /**
     * Delete talent.
     */
    public function destroyTalent($id)
    {
        $talent = \App\Models\UserTalent::where('user_id', session('user_id'))->findOrFail($id);
        $talent->delete();

        return redirect()->back()->with('success', 'Talent deleted successfully!');
    }
}
