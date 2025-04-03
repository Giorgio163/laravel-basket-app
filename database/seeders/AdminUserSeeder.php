<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {

        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $admin = User::updateOrCreate(
            ['email' => 'test@test.com'],
            [
                'name' => 'Test Admin',
                'email' => 'test@test.com',
                'password' => Hash::make('test123'),
            ]
        );

        $admin->assignRole('admin');
    }
}
