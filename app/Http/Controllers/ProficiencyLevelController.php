<?php

namespace App\Http\Controllers;

use App\Models\ProficiencyLevel;
use Illuminate\Http\Request;

class ProficiencyLevelController extends Controller
{
    /**
     * Display a listing of the proficiency levels.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $proficiencyLevels = ProficiencyLevel::all();

        return response()->json([
            'success' => true,
            'data' => $proficiencyLevels,
        ]);
    }

    /**
     * Store a newly created proficiency level.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $proficiencyLevel = ProficiencyLevel::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $proficiencyLevel,
        ]);
    }

    /**
     * Display the specified proficiency level.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $proficiencyLevel = ProficiencyLevel::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $proficiencyLevel,
        ]);
    }

    /**
     * Update the specified proficiency level.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $proficiencyLevel = ProficiencyLevel::findOrFail($id);

        $proficiencyLevel->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'data' => $proficiencyLevel,
        ]);
    }

    /**
     * Remove the specified proficiency level from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $proficiencyLevel = ProficiencyLevel::findOrFail($id);

        $proficiencyLevel->delete();

        return response()->json([
            'success' => true,
            'message' => 'ProficiencyLevel deleted successfully.',
        ]);
    }
}
