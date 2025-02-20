<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        return response()->json([
            'skills' => $skills
        ]);
    }

    public function show($id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json([
                'error' => 'Skill not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Successfully retrieved skill',
            'skill' => $skill
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $skill = new Skill();
        $skill->fill($request->all());
        $skill->save();

        return response()->json([
            'message' => 'Successfully created skill',
            'skill' => $skill
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json([
                'error' => 'Skill not found'
            ], 404);
        }

        $skill->fill($request->all());
        $skill->save();

        return response()->json([
            'message' => 'Successfully updated skill',
            'skill' => $skill
        ]);
    }

    public function destroy($id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json([
                'error' => 'Skill not found'
            ], 404);
        }

        $skill->delete();

        return response()->json([
            'message' => 'Successfully deleted skill',
            'skill' => $skill
        ]);
    }
}