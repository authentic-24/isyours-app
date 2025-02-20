<?php

namespace App\Http\Controllers;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    public function index()
    {
        $jobTypes = JobType::all();

        return response()->json([
            'success' => true,
            'data' => $jobTypes,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $jobType = JobType::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jobType,
        ]);
    }

    public function show($id)
    {
        $jobType = JobType::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $jobType,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $jobType = JobType::findOrFail($id);

        $jobType->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jobType,
        ]);
    }

    public function destroy($id)
    {
        $jobType = JobType::findOrFail($id);

        $jobType->delete();

        return response()->json([
            'success' => true,
            'message' => 'JobType deleted successfully.',
        ]);
    }
}
