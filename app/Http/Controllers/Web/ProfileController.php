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

        $user = User::with([
            'workExperiences',
            'behavioralCompetencies',
            'powerSkills',
            'organizationalCultureValues',
            'leadershipPreferences'
        ])->find(session('user_id'));
        $data['user'] = $user;
        //dd($user);
        $response = $countryService->getCountries();
        $countries = $this->checkErrors($response);
        $data['countries'] = $countries['countries'];
        $data['states'] = State::all();
        $data['city'] = City::find($user->city_id);
        $data['visas'] = Visa::all();
        $data['educationLevels'] = EducationLevel::all();

        // Cargar las listas completas para los selects
        $data['behavioralCompetencies'] = \App\Models\BehavioralCompetency::where('is_active', true)
            ->orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');
        $data['powerSkills'] = \App\Models\PowerSkill::where('is_active', true)
            ->orderBy('name')
            ->get();
        $data['cultureValues'] = \App\Models\OrganizationalCultureValue::where('is_active', true)
            ->orderBy('name')
            ->get();
        $data['leadershipPrefs'] = \App\Models\LeadershipPreference::where('is_active', true)
            ->orderBy('name')
            ->get();

        if ($user->license_plates == " ") {
            $user->license_plates = "";
        }

        // Calcular porcentaje de completitud del perfil
        $data['profileCompleteness'] = $this->calculateProfileCompleteness($user);

        //dd($data);
        return view('profile.edit', $data);
    }

    public function skills()
    {
        $user = User::with([
            'behavioralCompetencies',
            'powerSkills',
            'organizationalCultureValues',
            'leadershipPreferences'
        ])->find(session('user_id'));

        if (!$user) {
            return redirect()->route('web_login');
        }

        $data = [];
        $data['user'] = $user;
        $data['behavioralCompetencies'] = \App\Models\BehavioralCompetency::where('is_active', true)
            ->orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');
        $data['powerSkills'] = \App\Models\PowerSkill::where('is_active', true)
            ->orderBy('name')
            ->get();
        $data['cultureValues'] = \App\Models\OrganizationalCultureValue::where('is_active', true)
            ->orderBy('name')
            ->get();
        $data['leadershipPrefs'] = \App\Models\LeadershipPreference::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('profile.skills', $data);
    }

    /**
     * Calcula el porcentaje de completitud del perfil
     */
    private function calculateProfileCompleteness($user)
    {
        $fields = [
            // Información básica (peso: 30%)
            'basic' => [
                'first_name' => !empty($user->first_name),
                'last_name' => !empty($user->last_name),
                'email' => !empty($user->email),
                'phone_number' => !empty($user->phone_number),
                'identification' => !empty($user->identification),
                'country_of_origin_id' => !empty($user->country_of_origin_id),
                'education_level_id' => !empty($user->education_level_id),
                'city_id' => !empty($user->city_id),
                'visa_id' => !empty($user->visa_id),
            ],
            // Experiencia laboral (peso: 20%)
            'experience' => [
                'has_work_experience' => $user->workExperiences && $user->workExperiences->count() > 0,
            ],
            // Talentos (peso: 15%)
            'talents' => [
                'innate_talent' => !empty($user->innate_talent),
                'potential_talent' => !empty($user->potential_talent),
            ],
            // Competencias comportamentales (peso: 15%)
            'competencies' => [
                'has_behavioral_competencies' => $user->behavioralCompetencies && $user->behavioralCompetencies->count() >= 5,
            ],
            // Power Skills (peso: 10%)
            'power_skills' => [
                'has_power_skills' => $user->powerSkills && $user->powerSkills->count() >= 5,
            ],
            // Valores culturales (peso: 5%)
            'culture' => [
                'has_culture_values' => $user->organizationalCultureValues && $user->organizationalCultureValues->count() >= 3,
            ],
            // Preferencias de liderazgo (peso: 5%)
            'leadership' => [
                'has_leadership_prefs' => $user->leadershipPreferences && $user->leadershipPreferences->count() >= 3,
            ],
        ];

        $weights = [
            'basic' => 30,
            'experience' => 20,
            'talents' => 15,
            'competencies' => 15,
            'power_skills' => 10,
            'culture' => 5,
            'leadership' => 5,
        ];

        $totalScore = 0;

        foreach ($fields as $category => $categoryFields) {
            $categoryTotal = count($categoryFields);
            $categoryCompleted = count(array_filter($categoryFields));
            $categoryPercentage = ($categoryTotal > 0) ? ($categoryCompleted / $categoryTotal) : 0;
            $totalScore += $categoryPercentage * $weights[$category];
        }

        return [
            'percentage' => round($totalScore),
            'details' => [
                'basic' => [
                    'completed' => count(array_filter($fields['basic'])),
                    'total' => count($fields['basic']),
                    'weight' => $weights['basic']
                ],
                'experience' => [
                    'completed' => count(array_filter($fields['experience'])),
                    'total' => count($fields['experience']),
                    'weight' => $weights['experience']
                ],
                'talents' => [
                    'completed' => count(array_filter($fields['talents'])),
                    'total' => count($fields['talents']),
                    'weight' => $weights['talents']
                ],
                'competencies' => [
                    'completed' => count(array_filter($fields['competencies'])),
                    'total' => count($fields['competencies']),
                    'weight' => $weights['competencies']
                ],
                'power_skills' => [
                    'completed' => count(array_filter($fields['power_skills'])),
                    'total' => count($fields['power_skills']),
                    'weight' => $weights['power_skills']
                ],
                'culture' => [
                    'completed' => count(array_filter($fields['culture'])),
                    'total' => count($fields['culture']),
                    'weight' => $weights['culture']
                ],
                'leadership' => [
                    'completed' => count(array_filter($fields['leadership'])),
                    'total' => count($fields['leadership']),
                    'weight' => $weights['leadership']
                ],
            ]
        ];
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
}
