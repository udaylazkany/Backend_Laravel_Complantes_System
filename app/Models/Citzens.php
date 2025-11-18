<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citzens extends Model
{
    use HasFactory;
    protected $fillable = ['firstName','lastName','email','CardId','Brithday','phoneNumber'];
    public function complants()
    {
        return $this->belongsToMany(complants::class,'complants__citzens');
    }
}
