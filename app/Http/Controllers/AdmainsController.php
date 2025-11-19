<?php

namespace App\Http\Controllers;

use App\Models\Admains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdmainsController extends Controller
{
   public function Login(Request $request)
   {
    $credentails=$request->validate(['email'=>'required|email','password'=> 'required']);

    if(!Auth::attempt($credentails))
    {
        return response()->json(['message'=>'Invalid credentials'],401);
    }
    $admain=Auth::user();
   
    $token =$admain->createToken('auth_token')->plainTextToken;
    return response()->json(['message'=> 'Login successful','Admain'=>$admain,'token'=>$token],200);
   }
   public function Logout(Request $request)
   {
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logged out successfully']);
   }
   
}

