<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Admain;

class Departments extends Model
{
    protected $table="departments";
    use HasFactory;
    protected $fillable = ['name_department','manager_id'] ;
    public function admain()
    {
        return $this->belongsTo(Admain::class,'manager_id');
        
    }
    public function employee()
    {
        return $this->hasMany(Employees::class);
    }
    public function complants()
    {
        return $this->hasMany(complants::class,'department_id');
    }
}
