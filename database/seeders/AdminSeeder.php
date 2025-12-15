<?php

namespace Database\Seeders;

use App\Models\Admains;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run():void
    {
    $admins = Admains::create(['firstName'=>'uday',
    'lastName'=> 'lazkany', 
    'email'=>'ulazkany@gmail.com',
    
    'password'=> Hash::make('hadel98olamath'),
    
]);
    
   
    }
}
