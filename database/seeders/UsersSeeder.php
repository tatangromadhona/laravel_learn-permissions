<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now()
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user'),
            'email_verified_at' => now()
        ]);
        $user->assignRole('user');
    }
}
