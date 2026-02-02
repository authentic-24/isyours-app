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

        // Actualizar campos básicos
        $user->fill($request->except([
            'behavioral_competencies',
            'power_skills',
            'culture_values',
            'leadership_preferences'
        ]));

        if (is_null($user->visa_number)) {
            $user->visa_number = " ";
        }
        if (is_null($user->license_plates)) {
            $user->license_plates = " ";
        }
        $user->save();

        // Sincronizar competencias comportamentales
        if ($request->has('behavioral_competencies')) {
            $competencies = [];
            foreach ($request->behavioral_competencies as $competencyId => $level) {
                if ($level > 0) {
                    $competencies[$competencyId] = ['level' => $level];
                }
            }
            $user->behavioralCompetencies()->sync($competencies);
        } else {
            $user->behavioralCompetencies()->detach();
        }

        // Sincronizar power skills
        if ($request->has('power_skills')) {
            $skills = [];
            foreach ($request->power_skills as $skillId => $level) {
                if ($level > 0) {
                    $skills[$skillId] = ['level' => $level];
                }
            }
            $user->powerSkills()->sync($skills);
        } else {
            $user->powerSkills()->detach();
        }

        // Sincronizar valores de cultura organizacional
        if ($request->has('culture_values')) {
            $values = [];
            foreach ($request->culture_values as $valueId => $priority) {
                if ($priority > 0) {
                    $values[$valueId] = ['priority' => $priority];
                }
            }
            $user->organizationalCultureValues()->sync($values);
        } else {
            $user->organizationalCultureValues()->detach();
        }

        // Sincronizar preferencias de liderazgo
        if ($request->has('leadership_preferences')) {
            $preferences = [];
            foreach ($request->leadership_preferences as $prefId => $importance) {
                if ($importance > 0) {
                    $preferences[$prefId] = ['importance' => $importance];
                }
            }
            $user->leadershipPreferences()->sync($preferences);
        } else {
            $user->leadershipPreferences()->detach();
        }

        return redirect()->back()->with('success', 'Perfil actualizado exitosamente!');
    }

    /**
     * Show my applications (job offers the user has applied to).
     */
    public function myApplications(Request $request)
    {
        $user = User::find(session('user_id'));

        if (!$user) {
            return redirect()->route('web_login');
        }

        // Get all job offers the user has applied to
        $applications = $user->jobOffers()
            ->with([
                'jobType',
                'jobLevel',
                'jobTitle',
                'educationLevel',
                'city.state',
                'company'
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('candidates/my_applications', ['applications' => $applications]);
    }

    /**
     * Show candidate profile with work experience and professional profile.
     */
    public function show($id)
    {
        $candidate = User::with([
            'workExperiences',
            'behavioralCompetencies',
            'powerSkills',
            'organizationalCultureValues',
            'leadershipPreferences',
            'city.state',
            'visa',
            'educationLevel',
            'countryOfOrigin'
        ])->findOrFail($id);

        return view('candidates/show', ['candidate' => $candidate]);
    }
}
