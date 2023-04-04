<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class MyPersonalDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'giorgio',
            'email'=>'giorgio@gmail.com',
            'password'=>bcrypt('giorgio'),
            'sesso'=>'uomo',
            'età'=>'45',
            'peso'=>'70',
            'altezza'=>'178',
            'email_verified_at'=>now()
        ]);
        
        User::create([
            'name'=>'gianna',
            'email'=>'gianna@gmail.com',
            'password'=>bcrypt('gianna'),
            'sesso'=>'donna',
            'età'=>'28',
            'peso'=>'51',
            'altezza'=>'162',
            'email_verified_at'=>now()
        ]);
    }
}
