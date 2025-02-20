<?php

namespace App\Http\Controllers;

use App\Models\JobLevel;
use Illuminate\Http\Request;

class JobLevelController extends Controller
{
    public function index()
    {
        $jobLevels = JobLevel::all();

        return response()->json([
            'success' => true,
            'data' => $jobLevels,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $jobLevel = JobLevel::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jobLevel,
        ]);
    }

    public function show($id)
    {
        $jobLevel = JobLevel::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $jobLevel,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $jobLevel = JobLevel::findOrFail($id);

        $jobLevel->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jobLevel,
        ]);
    }

    public function destroy($id)
    {
        $jobLevel = JobLevel::findOrFail($id);

        $jobLevel->delete();

        return response()->json([
            'success' => true,
            'message' => 'JobLevel deleted successfully.',
        ]);
    }
}
