<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(
            [
                'name' => 'super-admin',
                'display_name' => 'User Administrator', // optional
                'description' => 'User is allowed to manage all resources', // optional
            ],
            [
                'name' => 'admin',
                'display_name' => 'User Administrator', // optional
                'description' => 'User is allowed to manage other users', // optional
            ],
                [
                    'name' => 'owner',
                    'display_name' => 'Post Owner', // optional
                    'description' => 'User is the owner of a posts', // optional
                ],
        );
    }
}
