<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['Location'];
    public function complants()
    {
        return $this->belongsToMany(Complants::class,'complants__areas');
    }
}
