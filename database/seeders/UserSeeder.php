<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $us = User::create(
            [
                'name'=>'Administrador',
                'email'=>'admin@gmail.com',
                'password' =>  Hash::make(12345678),
                'role'=>'Admin'
            ]
        );
        $us->assignRole('Admin');

        $us = User::create(
            [
                'name'=>'Evelyn04',
                'email'=>'evyrodriguez.03@gmail.com',
                'password' => Hash::make(12345678),
                'role'=>'Secretaria'
            ]
        );
        $us->assignRole('Secretaria');

    }
}