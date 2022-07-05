<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->name = "Akun Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('1234');
        $user->role = "Admin";
        $user->save();

        $user = new \App\Models\User;
        $user->name = "Akun Satpam";
        $user->email = "satpam@gmail.com";
        $user->password = Hash::make('1234');
        $user->role = "Satpam";
        $user->save();

         $user = new \App\Models\User;
        $user->name = "Akun Musyrif";
        $user->email = "musyrif@gmail.com";
        $user->password = Hash::make('1234');
        $user->role = "Musyrif";
        $user->save();
    }
}