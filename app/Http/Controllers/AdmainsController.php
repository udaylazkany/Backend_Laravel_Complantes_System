<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Departments; 
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmainsController extends Controller
{
   public function Login(Request $request)
   {
      $credentails = $request->validate([
          'email' => 'required|email',
          'password' => 'required'
      ]);

      if (!Auth::guard('admin')->attempt($credentails)) {
          return response()->json(['message' => 'Invalid credentials','status'=>401], 401);
      }

      $admain = Auth::guard('admin')->user();
      $token = $admain->createToken('auth_token')->plainTextToken;

      return response()->json([
          'message'=> 'Login successful',
          'Admain' => $admain,
          'token'  => $token,'status'=>201
      ],201);
   }

   public function Logout(Request $request)
   {
      try {
          $user = $request->user();
          if ($user) {
              $user->tokens()->delete();
              return response()->json(['message'=> 'Logout Successful','status'=>201],201);
          }
          return response()->json(['message'=> 'No active session','status'=>203],203);
      } catch(\Exception $e) {
          return response()->json(['message'=> 'Exception: '.$e->getMessage()]);
      }
   }

   public function Create_Department(Request $request)
   {
      $Validated = $request->validate([
          'name_department' => 'required|string|unique:departments,name_department',
      ],[
          'name_department.required' => 'name_department is required',
          'name_department.unique'   => 'name_department is found before',
      ]);

      $manager_Id = auth()->id();

      $department = Departments::create([
         'name_department' => $Validated['name_department'],
         'manager_id'      => $manager_Id
      ]);

      return response()->json([
          'message'=> 'Department created successfully',
          'department' => $department,'status'=>201
      ],201);
   }
   public function Show_Department()
   {
      $Deprtments=Departments::all();
      return response()->json(['Department'=>$Deprtments,'status'=>201],201);
   }
   public function Create_Location(Request $request)
   {
    $validated = $request->validate([
        'Location'=>'required|string'
    ]);
    $location=Area::create(['Location'=>$validated['Location']]);
    return response()->json([
        
        'message' => 'Location added successfully!',
        'data' => $location,
        'status'=>201
    ], 201);
   }
public function Show_Area()
   {
      $Area=Area::all();
      return response()->json(['Area'=>$Area,'status'=>201],201);
   }
   public function add_employee(Request $request)
   {
    $validated=$request->validate([
        'firstname'=>'required|string',
        'lastname'=>'required|string',
        'email' => 'required|email|unique:employees,email',
        'phone_number'=>'required|string|size:10',
        'employee_code'=>'required|string',
        'department_id' => 'required|exists:departments,id',
        'is_department_manager'=>'nullable|boolean'

]);
$add_employee=Employees::create(['firstname'=>$validated['firstname'],
'lastname'=>$validated['lastname'],
'email'=>$validated['email'],
'phone_number'=>$validated['phone_number'],
'employee_code'=>$validated['employee_code'],
'department_id'=>$validated['department_id'],
'is_department_manager'=>$validated['is_department_manager'] ?? false


]);
    return response()->json([
        
        'message' => 'Employee added successfully!',
        'data' => $add_employee,
        'status'=>201
    ], 201);

   }

}
