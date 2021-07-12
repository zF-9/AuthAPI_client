<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class TokenController extends Controller
{


    public function token(Request $request, \Tymon\JWTAuth\JWTAuth $auth)
    {
    	Auth::loginUsingId($request->id);


        $user = Auth::user();
        $claims = ['userid' => $user->id, 'email' => $user->email];


        $token = $auth->fromUser($user, $claims);
        return response()->json(['token' => $token]);
    }
}