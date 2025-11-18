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

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'role',
        'password'
    ];

    public function department()
    {
        return $this->hasMany(Departments::class);
    }
}
