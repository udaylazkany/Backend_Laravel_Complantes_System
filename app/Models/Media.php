<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
 
      use HasFactory;
    protected $table='Media';
    protected $fillable = ['Picture','file','complants_Id'];
    public function Complants()
    {
        
    return $this->belongsTo(complants::class,'complants_Id');
    }
}
