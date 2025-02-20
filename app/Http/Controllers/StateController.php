<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        return response()->json([
            'states' => $states
        ]);
    }

    public function show($id)
    {
        $state = State::find($id);
        if (!$state) {
            return response()->json(['error' => 'State not found'], 404);
        }
        return response()->json([
            'state' => $state
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $state = State::create($validatedData);
        return response()->json([
            'message' => 'State created successfully',
            'state' => $state
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $state = State::find($id);
        if (!$state) {
            return response()->json(['error' => 'State not found'], 404);
        }

        $state->update($validatedData);
        return response()->json([
            'message' => 'State updated successfully',
            'state' => $state
        ]);
        
    }

    public function destroy($id)
    {
        $state = State::find($id);
        if (!$state) {
            return response()->json([
                'message' => 'State not found'
            ], 404);
        }

        $state->delete();

        return response()->json([
            'message' => 'State deleted successfully'
        ]);
    }

    public function getByCountry($country_id)
    {
        // Validar que el país exista
        $country = Country::find($country_id);
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }

        // Obtener los estados que pertenecen al país
        $states = State::where('country_id', $country_id)
                        ->orderBy('name', 'asc')
                        ->get();
        return response()->json([
            'states' => $states,
        ]);
    }

}