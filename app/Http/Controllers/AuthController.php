<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Mail\WelcomeEmail;

class AuthController extends Controller
{

    public function get_csrf_token()
    {
        return csrf_token();
    }
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_type' => ['required',  'in:candidate,employer'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'identification' => ['required', 'string', 'max:255'],
            'is_agree_terms_privacy' => ['required', 'boolean'],
            'have_vehicle' => ['required', 'boolean'],
            'city_id' => ['required',  'exists:cities,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // $user = \App\Models\User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        $user = new \App\Models\User();
        $user->fill($request->all());
        $user->name = "";
        $user->password = bcrypt($request->password);
        $user->save();

        if($request->user_type == 'candidate'){
            $user->assignRole('candidate');
        } elseif ($request->user_type == 'employer') {
            $user->assignRole('employer');
        }

        // Add email sending logic here
        try {
            Mail::to($user->email)->queue(new WelcomeEmail($user));
            Log::info('Welcome email sent successfully', ['user_id' => $user->id]);
        } catch (\Exception $e) {
            Log::error('Failed to send welcome email', ['user_id' => $user->id, 'error' => $e->getMessage()]);
        }

        $token = $user->createToken('API Token');
        return response()->json([
            'message' => 'Successfully registered',
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'identification' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'integer', 'max:99999'],
            'is_agree_terms_privacy' => ['required', 'boolean'],
            'have_vehicle' => ['required', 'boolean'],
            'city_id' => ['required', 'exists:cities,id'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $user = \App\Models\User::findOrFail($id);
        $user->fill($request->except('email','password'));
        $user->save();
        
        return response()->json([
            'message' => 'Successfully updated',
            'user' => $user
        ]);
    }

    public function show($id)
    {
        $user = \App\Models\User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json($user);
    }


    /**
     * Login a user and return a token.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        $user = $request->user();
        
        $user->role_name = $user->getRoleNames()->first();


        $token = $user->createToken('API Token');
        // return $token;
        return response()->json([
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    /**
     * Logout a user (revoke the user's token).
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
