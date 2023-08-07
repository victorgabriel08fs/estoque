<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create(['name' => 'Admin', 'type' => 'Admin', 'email' => 'admin@admin.com', 'phone' => '5538991587105', 'permission_end_at' => '2023-08-20', 'password' => bcrypt('password')]);
        $user = User::create(['name' => 'Victor', 'email' => 'victor@admin.com', 'phone' => '5538991587105', 'permission_end_at' => '2023-08-20', 'password' => bcrypt('password')]);

        $admin->assignRole('Admin');
        $user->assignRole('User');
    }
}
