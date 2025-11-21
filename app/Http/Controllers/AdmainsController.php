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

  if (!Auth::guard('admin')->attempt($credentails)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $admain = Auth::guard('admin')->user();
    $token =$admain->createToken('auth_token')->plainTextToken;
    return response()->json(['message'=> 'Login successful','Admain'=>$admain,'token'=>$token],201);
   }
   public function Logout(Request $request)
   {
      $user =$request->user();
      $user->tokens()->delete();
      return response()->json(['message'=> 'logout Successful'],201);
   }
   
   
}

