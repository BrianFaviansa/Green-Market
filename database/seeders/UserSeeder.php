<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '08123456789',
                'home_address' => 'Admin Street',
                'password' => bcrypt('password'),
                'is_admin' => 1
            ],
            [
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'phone_number' => '08976543231',
                'home_address' => 'User 1 Street',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'phone_number' => '08976543213',
                'home_address' => 'User 2 Street',
                'password' => bcrypt('password'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
