<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    public function index()
    {
        $educationLevels = EducationLevel::all();

        return response()->json([
            'success' => true,
            'data' => $educationLevels,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $educationLevel = EducationLevel::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $educationLevel,
        ]);
    }

    public function show($id)
    {
        $educationLevel = EducationLevel::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $educationLevel,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $educationLevel = EducationLevel::findOrFail($id);

        $educationLevel->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $educationLevel,
        ]);
    }

    public function destroy($id)
    {
        $educationLevel = EducationLevel::findOrFail($id);

        $educationLevel->delete();

        return response()->json([
            'success' => true,
            'message' => 'EducationLevel deleted successfully.',
        ]);
    }
}
