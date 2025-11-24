<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complants extends Model
{
    use HasFactory;
    protected $fillable = ['name_complants','description','file_path','image_path','department_id'] ;
    public function citzens()
    {
       return $this->belongsToMany(Citzen::class,'complants__citzens');
    }
    public function area()
    {
      return  $this->belongsToMany(Area::class,'complants__areas');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
      public function media()
    {
        return $this->hasMany(Media::class);
    }
}
