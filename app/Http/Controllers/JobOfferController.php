<?php

namespace App\Http\Controllers;

use App\Models\KeyResponsability;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Validator;



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
        if(!is_null($user)){
            $user = auth()->user();
            if($user->company){
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
            'company'
        )->orderBy('created_at', 'DESC')->take(3)->get();
        return response()->json($jobOffers);
    }
}
