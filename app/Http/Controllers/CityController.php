<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    public function show($id)
    {
        $city = City::findOrFail($id);
        return response()->json($city);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => ['required', 'exists:states,id'],
            'name' => ['required', 'string', 'max:255'],
            'county' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'double'],
            'longitude' => ['required', 'double'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $city = new City();
        $city->fill($request->all());
        $city->save();

        return response()->json([
            'message' => 'Successfully created',
            'city' => $city
        ]);
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'state_id' => ['sometimes', 'exists:states,id'],
            'name' => ['sometimes', 'string', 'max:255'],
            'county' => ['nullable', 'string', 'max:255'],
            'latitude' => ['nullable', 'double'],
            'longitude' => ['nullable', 'double'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $city->fill($request->all());
        $city->save();

        return response()->json([
            'message' => 'Successfully updated',
            'city' => $city
        ]);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json([
            'message' => 'Successfully deleted',
        ]);
    }

    public function getByState($state_id)
    {
        // Validar que el estado exista
        $state = State::find($state_id);
        if (!$state) {
            return response()->json(['error' => 'State not found'], 404);
        }
    
        // Obtener las ciudades que pertenecen al estado
        $cities = City::where('state_id', $state_id)
                        ->orderBy('name', 'asc')
                        ->get();
    
        return response()->json([
            'cities' => $cities,
        ]);
    }
}