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
            'image_Path' => 'nullable|mimes:jpg,jpeg,png|max:2048', 
            'file_Path'=>'nullable|mimes:pdf|max:5120',
            'department_id' => 'required|exists:departments,id',
            'citizen_id'     => 'nullable|array',
            'Area_id' => 'nullable|array',
            


            
        ],[
            'name_complants.required'=> 'Please enter the complaint name',
            'description.min'=> 'Description must be at least 5 characters',
            'description.required'=> 'Please enter a description',
            'image_Path.mimes'=>'Image must be jpg, jpeg, png',
            'image_Path.max'=> 'Image size must not exceed 2MB',
            'file_Path.max'=>'File size must not exceed 5MB',
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
        $department = Departments::find($validated['department_id']);
        $complants = $department->complants()->create($validated);
        
        
        if (!empty($validated['citizen_id'])) {
    $complants->citzens()->attach($validated['citizen_id']);
}

if (!empty($validated['Area_id'])) {
    $complants->area()->attach($validated['Area_id']);
}

        return response()->json(['status'=>true, 'message' => 'Complaint added successfully!','data'=>[[
        'id'          => $complants->id,
        'title'       => $complants->name_complants,
        'description' => $complants->description,
        'image'       => $complants->image_path,
        'file'        => $complants->file_path,
        'created_at'  => $complants->created_at,
        'updated_at'  => $complants->updated_at,
    ],
    'department' => [
        'id'   => $complants->department->id,
        'name' => $complants->department->name_department,
        'manager_id' => $complants->department->manager_id,
    ],
    'relations' => [
        'citzens' => $complants->citzens,
        'areas'   => $complants->area]]],201);
    }
}
