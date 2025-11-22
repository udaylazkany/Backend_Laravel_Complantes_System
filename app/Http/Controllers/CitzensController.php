<?php

namespace App\Http\Controllers;

use App\Models\Citzens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;


class CitzensController extends Controller
{
      public function store(Request $request)
    {

    $validated = $request->validate([
    'firstName'   => 'required|string|max:255',
    'lastName'    => 'required|string|max:255',
    'email'       => 'required|email|unique:citizens,email',
    
    'CardId'      => 'required|string|unique:citizens,CardId',
    'Birthday'    => 'required|date',
    'password'    => 'required|min:6',
], [
    'firstName.required' => 'First name is required',
    'lastName.required'  => 'Last name is required',
    'email.required'     => 'Email is required ',
    'email.email'        => 'Should Enter email Coreccted',
    'email.unique'       => 'Email is found befor',
    
    'CardId.unique'      => 'Card id is found ',
    'Birthday.required'  => 'Birthday is required',
    'Birthday.date'      => 'Should Enter a corected Date',
    'password.required'  => 'Password is required',
    'password.min'       => 'Password should be biger',
]);

$Citzen = Citzens::create([
    'firstName'   => $validated['firstName'],
    'lastName'    => $validated['lastName'], 
    'email'       => $validated['email'],
   
    'CardId'      => $validated['CardId'],
    'Birthday'    => $validated['Birthday'],
    'password'    => Hash::make($validated['password']),
]);

$token = $Citzen->createToken('auth_token')->plainTextToken;


return response()->json([
  'message'=>'register and  login successfuly',
  'Citzen'=>$Citzen,
  'token'=>$token,
], 201);

    
   
    
}

public function Login(Request $request)
{
  $credentails =$request->validate(['email'=>'required|email','password'=> 'required']);
    if (!Auth::guard('citizen')->attempt($credentails)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $Citizen = Auth::guard('citizen')->user();
  $token =$Citizen->createToken('auth_token')->plainTextToken;
  return response()->json(["message"=>"login Successfully","Citizen"=>$Citizen,"token"=>$token],201);
}

public function logout(Request $request) 
{

  try{
    $user =$request->user();
  if($user)
  {
    $user->tokens()->delete();
    return response()->json(['message'=>'logout Successfuly'],201);
  }
    return response()->json(['message'=>'No active session'],203);
  

  }
  catch(Exception $e)
  {
    return response()->json(['message'=>'Excption'+$e]);
  }
  
}
public function Show_Department()
   {
      $Deprtments=Departments::select('name_department')->get();
      return response()->json(['Department'=>$Deprtments],201);
   }
}
