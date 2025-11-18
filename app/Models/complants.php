<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complants extends Model
{
    use HasFactory;
    protected $fillable = ['name_complants','description','file_path','image_path'] ;
    public function citzens()
    {
        $this->belongsToMany(Citzen::class,'complants__citzens');
    }
    public function area()
    {
        $this->belongsToMany(Area::class,'complants__areas');
    }
}
