<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citzens;
use App\Models\Departments;
class complants extends Model
{
      use HasFactory;
      protected $fillable = ['name_complants','description','file_path','image_path','department_id'] ;
    public function citzens()
    {
       return $this->belongsToMany(Citzens::class,'complants__citzens', 'Complants_id', 'citizen_id');
    } 
    public function area()
    {
      return  $this->belongsToMany(Area::class,'complants__areas','Complants_id',relatedPivotKey: 'Area_id');
    }
    public function department()
    {
        return $this->belongsTo(Departments::class,'department_id');
    }
      public function media()
    {
        return $this->hasMany(Media::class);
    }
}
