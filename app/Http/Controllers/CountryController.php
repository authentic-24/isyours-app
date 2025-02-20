<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return response()->json([
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries|max:255',
        ]);

        $country = new Country;
        $country->name = $request->name;
        $country->save();

        return response()->json([
            'message' => 'Country created successfully',
            'country' => $country
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'message' => 'Country not found'
            ], 404);
        }

        return response()->json([
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:countries,name,'.$id.'|max:255',
        ]);

        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'message' => 'Country not found'
            ], 404);
        }

        $country->name = $request->name;
        $country->save();

        return response()->json([
            'message' => 'Country updated successfully',
            'country' => $country
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'message' => 'Country not found'
            ], 404);
        }

        $country->delete();

        return response()->json([
            'message' => 'Country deleted successfully'
        ]);
    }
}