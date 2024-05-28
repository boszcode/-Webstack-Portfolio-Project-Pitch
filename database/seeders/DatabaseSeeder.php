<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'first_name'=>'Admin',
            'last_name'=>'Jona',
            'age'=>20,
            'phone'=>'+2519858953',
            'sex'=>1,
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678'),
            'role'=>'admin',
        ]);
    }
}
