<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admains;
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
    $admains = Admains::create(['firstName'=>'uday',
    'lastName'=> 'lazkany', 
    'email'=>'ulazkany@gmail.com',
    'phoneNumber'=>'0988704367',
    'password'=> Hash::make('hadel98olamath'),
    'role'=>'Admain'
]);
    
   
    }
}
