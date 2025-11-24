<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments; 

class ComplantsController extends Controller
{
    public function Create(Request $request)   
    {
        $validated= $request->validate([
            'name_complants'=>'required|string',
            'description'=>'required|string|min:5',
            'image_path' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', 
            'file_path'=>'nullable|mimes:pdf|max:5120'
            
        ],[
            'name_complants.required'=> 'Please enter the complaint name',
            'description.min'=> 'Description must be at least 5 characters',
            'description.required'=> 'Please enter a description',
            'image_path.mimes'=>'Image must be jpg, jpeg, png',
            'image_path.max'=> 'Image size must not exceed 2MB',
            'file_path.max'=>'File size must not exceed 5MB',
            'file_path.mimes'=>'File must be a PDF'
        ]);
        if($request->hasFile('image_path'))
        {
            $validated['image_path']=$request->file('image_path')->store('complants/images','public');
        }
        if($request->hasFile('file_path'))
        {
            $validated['file_path']=$request->file('file_path')->store('complants/file','public');
        }
        $department = Departments::find($request->department_id);
        $complants = $department->complants()->create($validated);
        return response()->json(['status'=>true, 'message' => 'Complaint added successfully!','data'=>$complants],201);
    }
}
