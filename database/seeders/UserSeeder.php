<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Muhammad',
            'email'=>'muhammad7858@gmail.com',
            'password'=>Hash::make('muhammad'),
            'role'=>'admin'
        ]);
    }
}
