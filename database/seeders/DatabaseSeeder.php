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
        user::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'level' => 'user',
        ]);
        user::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'level' => 'admin',
        ]);
        user::create([
            'name' => 'kasubid',
            'email' => 'kasubid@gmail.com',
            'password' => bcrypt('test1234'),
            'level' => 'kasubid',
        ]);

    }
}
