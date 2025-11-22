<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use app\Models\complants;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Override;

class Citzens extends Authenticatable
{
    

    protected $table = 'citizens';


    use HasFactory , HasApiTokens,Notifiable;
    protected $fillable = ['firstName','lastName','email','CardId','Birthday','password'];
    public function complants()
    {
        return $this->belongsToMany(complants::class,'complants__citzens');
    }
}
