<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    public function index()
    {
        $jobTitles = JobTitle::with('jobLevel')->get();

        return response()->json([
            'success' => true,
            'data' => $jobTitles,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job_level_id' => 'required|exists:job_levels,id',
        ]);

        $jobTitle = JobTitle::create([
            'name' => $request->name,
            'job_level_id' => $request->job_level_id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jobTitle,
        ]);
    }

    public function show($id)
    {
        $jobTitle = JobTitle::with('jobLevel')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $jobTitle,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job_level_id' => 'required|exists:job_levels,id',
        ]);

        $jobTitle = JobTitle::findOrFail($id);

        $jobTitle->update([
            'name' => $request->name,
            'job_level_id' => $request->job_level_id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jobTitle,
        ]);
    }

    public function destroy($id)
    {
        $jobTitle = JobTitle::findOrFail($id);

        $jobTitle->delete();

        return response()->json([
            'success' => true,
            'message' => 'JobTitle deleted successfully.',
        ]);
    }
}
