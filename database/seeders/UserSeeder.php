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
        User::create(['name'=>'evelyn',
        'email'=>'evyrodriguez.03@gmail.com',
        'password'=>bcrypt('03evy1998')
    ])->assignRole('Admin');

    User::factory(9)->create();
    }
}
