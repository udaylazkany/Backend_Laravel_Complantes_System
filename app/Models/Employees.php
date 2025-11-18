<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = ['firstname','lastname','email','phone_number','employee_code','department_id'];
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
