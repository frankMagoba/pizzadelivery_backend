<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Login controller function
     */
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);

            $token->save();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'success' => true,
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
                'response' => [
                    'message'=>"User authenticated successfully",
                    'user'=>$request->user(),
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'response' => [
                'message'=>"Wrong email or password",
            ]
        ]);
    }

    /**
     * Register User
     */
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);

        if ( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);

        }

        $user = new User();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            'success' => true,
            'response' => [
                'message'=>"User registered successfully",
                'user'=>$user,
            ]
        ]);
    }

    /**
     * Get autheticated user
     */
    public function get_auth_user(Request $request){

        return response()->json([
            'user'=>$request->user(),
        ]);
    }

    /**
     * Logout authenticated user
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'success'=>true,
            'message' => 'Successfully logged out'
        ]);
    }
}
