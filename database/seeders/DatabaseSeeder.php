<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Admin::create([
            'full_name' => 'Admin User',
            'mobile' => '0597725085',
            'email' => 'admin@nova.com',
            'user_name' => 'admin',
            'address' => 'palatine',
            'password' => bcrypt('password'),
        ]);
    }
}
