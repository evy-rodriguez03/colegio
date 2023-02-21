<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
                'password' => 12345678,
                'role'=>'Admin'
            ]
        );
        $us->assignRole('Admin');

        $us = User::create(
            [
                'name'=>'Evelyn04',
                'email'=>'evyrodriguez.03@gmail.com',
                'password' => 12345,
                'role'=>'Secretaria'
            ]
        );
        $us->assignRole('Secretaria');

    }
}
