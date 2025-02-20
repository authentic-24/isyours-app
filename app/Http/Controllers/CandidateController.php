<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class CandidateController extends Controller
{
    public function index()
    {
        $users = User::with('city.state')->get();
        return response()->json($users);
    }

   
}
