<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@polodivisur.com',
            'role' => 'admin',
            'password' => bcrypt('polodivisur'),
        ]);

        User::create([
            'name' => 'Rumah Sakit',
            'email' => 'rs@polodivisur.com',
            'role' => 'rs',
            'password' => bcrypt('polodivisur'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@polodivisur.com',
            'role' => 'user',
            'password' => bcrypt('polodivisur'),
        ]);
    }
}
