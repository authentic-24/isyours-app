<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\KeyResponsability;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Validator;



class CompanyProfileController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'about' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $companyProfile = new CompanyProfile();
        $companyProfile->fill($request->all());
        $companyProfile->save();


        return response()->json(['data' => $companyProfile], 201);
    }
    
}
