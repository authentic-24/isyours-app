<?php

namespace App\Http\Controllers;

use App\Models\KeyResponsability;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class JobOfferController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::with(
            'jobType',
            'skills',
            'city.state',
            'users.city',
            'jobLevel',
            'jobTitle',
            'educationLevel',
            'language',
            'proficiencyLevel',
            'company',
        )->orderBy('created_at', 'DESC')->get();
        return response()->json($jobOffers);
    }

    public function show($id)
    {
        $jobOffer = JobOffer::with(
            'jobType',
            'skills',
            'city.state',
            'users.city',
            'jobLevel',
            'jobTitle',
            'educationLevel',
            'language',
            'proficiencyLevel',
            'keyResponsabilities',
            'company',
            'users.visa',
        )->findOrFail($id);
        return response()->json($jobOffer);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'job_type_id' => 'required|exists:job_types,id',
            'city_id' => 'required|exists:cities,id',
            //'server_position' => 'required|string',
            //'responsibilities' => 'required|string',
            'job_level_id' => 'required|exists:job_levels,id',
            'job_title_id' => 'required|exists:job_titles,id',
            'education_level_id' => 'required|exists:education_levels,id',
            'language_id' => 'required|exists:languages,id',
            'proficiency_level_id' => 'required|exists:proficiency_levels,id',
            'rate' => 'integer',
            'offered_salary' => 'integer',
            'years_of_experience' => 'integer',
            'expiration_date' => 'date',
            //'zip_code' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $jobOffer = new JobOffer();
        $jobOffer->fill($request->all());
        $user = auth()->user();
        if (!is_null($user)) {
            $user = auth()->user();
            if ($user->company) {
                $jobOffer->company_id = $user->company->id;
            }
        }
        $jobOffer->save();

        $responsibilities = json_decode($request->input('responsibilities', '[]'));
        //print_r($responsibilities);
        foreach ($responsibilities as $responsibility) {
            $key = new KeyResponsability(['responsability' => $responsibility]);
            $jobOffer->keyResponsabilities()->save($key);
        }
        $jobOffer->keyResponsabilities;

        if ($request->isMethod('get')) {
            return back();
        }

        // Check if request came from /job-post route and redirect to home
        if ($request->is('job-post')) {
            return redirect()->route('home')->with('success', 'Job offer created successfully!');
        }

        return response()->json(['data' => $jobOffer], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'job_type_id' => 'required|exists:job_types,id',
            'city_id' => 'required|exists:cities,id',
            'server_position' => 'required|string',
            'responsibilities' => 'required|string',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return response()->json(['error' => 'Job offer not found'], 404);
        }

        $jobOffer->fill([
            'description' => $request->input('description'),
            'job_type_id' => $request->input('job_type_id'),
            'city_id' => $request->input('city_id'),
            'server_position' => $request->input('server_position'),
            'responsibilities' => $request->input('responsibilities')
        ]);

        $jobOffer->skills()->sync($request->input('skills'));

        $jobOffer->save();

        return response()->json(['jobOffer' => $jobOffer], 200);
    }


    public function destroy($id)
    {
        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return response()->json(['message' => 'Job Offer not found'], 404);
        }

        $jobOffer->delete();

        return response()->json(['message' => 'Job Offer deleted successfully'], 200);
    }

    public function apply($job_offer_id)
    {
        $user = auth()->user();

        $jobOffer = JobOffer::find($job_offer_id);

        if (!$jobOffer) {
            return response()->json(['message' => 'Job Offer not found'], 404);
        }

        // Verificar que el usuario no haya aplicado antes a la misma oferta
        if ($jobOffer->users()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'You have already applied to this job offer.'], 422);
        }

        // Guardar la relación en la tabla pivot
        $jobOffer->users()->attach($user);

        return response()->json(['message' => 'Application successful.'], 200);
    }

    public function get_latest_offers()
    {
        try {
            $startTime = microtime(true);

            DB::enableQueryLog(); // Enable query logging

            $jobOffers = JobOffer::select(
                'job_offers.*',
                'job_types.name as job_type_name',
                'cities.name as city_name',
                'states.name as state_name',
                'states.code as state_code',
                'job_levels.name as job_level_name',
                'job_titles.name as job_title_name',
                'education_levels.name as education_level_name',
                'languages.name as language_name',
                'proficiency_levels.name as proficiency_level_name',
                'company_profile.name as company_name'
            )
                ->join('job_types', 'job_offers.job_type_id', '=', 'job_types.id')
                ->join('cities', 'job_offers.city_id', '=', 'cities.id')
                ->join('states', 'cities.state_id', '=', 'states.id')
                ->join('job_levels', 'job_offers.job_level_id', '=', 'job_levels.id')
                ->join('job_titles', 'job_offers.job_title_id', '=', 'job_titles.id')
                ->join('education_levels', 'job_offers.education_level_id', '=', 'education_levels.id')
                ->join('languages', 'job_offers.language_id', '=', 'languages.id')
                ->join('proficiency_levels', 'job_offers.proficiency_level_id', '=', 'proficiency_levels.id')
                ->leftJoin('company_profile', 'job_offers.company_id', '=', 'company_profile.id')
                ->orderBy('job_offers.created_at', 'DESC')
                ->take(3)
                ->get();

            // Fetch skills separately (as it's a many-to-many relationship)
            $jobOfferIds = $jobOffers->pluck('id')->toArray();
            $skills = DB::table('job_offer_skill')
                ->join('skills', 'job_offer_skill.skill_id', '=', 'skills.id')
                ->whereIn('job_offer_skill.job_offer_id', $jobOfferIds)
                ->select('job_offer_skill.job_offer_id', 'skills.id as skill_id', 'skills.name as skill_name')
                ->get();

            // Group skills by job offer
            $skillsByJobOffer = $skills->groupBy('job_offer_id');

            // Add skills to job offers
            $jobOffers->each(function ($jobOffer) use ($skillsByJobOffer) {
                $jobOffer->skills = $skillsByJobOffer->get($jobOffer->id, collect());
            });

            $queries = DB::getQueryLog(); // Get query log

            $endTime = microtime(true);
            $executionTime = ($endTime - $startTime) * 1000; // in milliseconds

            \Log::info('Query execution time: ' . $executionTime . 'ms');
            \Log::info('Latest job offers fetched', ['count' => $jobOffers->count()]);

            // Log each query
            foreach ($queries as $query) {
                \Log::info('SQL Query:', [
                    'query' => $query['query'],
                    'bindings' => $query['bindings'],
                    'time' => $query['time']
                ]);
            }

            DB::disableQueryLog(); // Disable query logging

            return response()->json($jobOffers);
        } catch (\Exception $e) {
            \Log::error('Error fetching latest job offers', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'An error occurred while fetching latest offers'], 500);
        }
    }

    public function create()
    {
        return view('job_offer.create', [
            'jobLevels' => \App\Models\JobLevel::all(),
            'jobTitles' => \App\Models\JobTitle::all(),
            'jobTypes' => \App\Models\JobType::all(),
            'educationLevels' => \App\Models\EducationLevel::all(),
            'languages' => \App\Models\Language::all(),
            'proficiencyLevels' => \App\Models\ProficiencyLevel::all(),
            'countries' => \App\Models\Country::all(),
        ]);
    }
}
