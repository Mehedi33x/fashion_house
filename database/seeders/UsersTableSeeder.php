<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            ['name' => 'Mehedi', 'email' => 'mehedi1@gmail.com', 'password' => bcrypt('12345'), 'role_id' => 1],
            ['name' => 'Hasan', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345'), 'role_id' => 1]
        ];
        User::insert($admin);
    }
}
