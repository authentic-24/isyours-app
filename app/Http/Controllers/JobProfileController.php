<?php

namespace App\Http\Controllers;

use App\Models\JobProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobProfileController extends Controller
{
    public function index(Request $request)
    {
        $query = JobProfile::with('experience', 'skill', 'user')->orderBy('created_at', 'desc');

        if ($request->has('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        $jobProfiles = $query->get();

        return response()->json($jobProfiles);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'experience_id' => ['required', 'exists:experiences,id'],
            'skill_id' => ['required', 'exists:skills,id'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobProfile = new JobProfile();
        $jobProfile->fill($request->all());
        $jobProfile->save();

        return response()->json([
            'message' => 'Successfully created',
            'job_profile' => $jobProfile
        ]);
    }

    public function show($id)
    {
        $jobProfile = JobProfile::with('experience', 'skill', 'user')->find($id);

        if (!$jobProfile) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json($jobProfile);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'experience_id' => ['exists:experiences,id'],
            'skill_id' => ['exists:skills,id'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jobProfile = JobProfile::find($id);

        if (!$jobProfile) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $jobProfile->fill($request->all());
        $jobProfile->save();

        return response()->json([
            'message' => 'Successfully updated',
            'job_profile' => $jobProfile
        ]);
    }

    public function destroy($id)
    {
        $jobProfile = JobProfile::find($id);

        if (!$jobProfile) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $jobProfile->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function getByUser(Request $request, $user_id)
    {
        $jobprofiles = JobProfile::with('experience', 'skill')->where('user_id', $user_id)->get();

        return response()->json([
            'jobsProfiles' => $jobprofiles
        ]);
    }
}
