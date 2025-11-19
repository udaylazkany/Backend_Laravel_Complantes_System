<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // مهم
use Laravel\Sanctum\HasApiTokens; // مهم
use Illuminate\Notifications\Notifiable;

class Admains extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = "admains";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       
         'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
