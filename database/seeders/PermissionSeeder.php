<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(
            [
                'name' => 'view-users',
                'display_name' => 'View Users', // optional
                'description' => 'view existing users', // optional
            ],
            [
                'name' => 'create-user',
                'display_name' => 'Create User', // optional
                'description' => 'create new user', // optional
            ],
            [
                'name' => 'edit-user',
                'display_name' => 'Edit User', // optional
                'description' => 'edit existing user', // optional
            ],
            [
                'name' => 'delete-user',
                'display_name' => 'Delete User', // optional
                'description' => 'delete existing user', // optional
            ],
            [
                'name' => 'view-roles',
                'display_name' => 'View Roles', // optional
                'description' => 'view existing roles', // optional
            ],
            [
                'name' => 'create-role',
                'display_name' => 'Create Role', // optional
                'description' => 'create new role', // optional
            ],
            [
                'name' => 'edit-role',
                'display_name' => 'Edit Role', // optional
                'description' => 'edit existing  role', // optional
            ],
            [
                'name' => 'delete-role',
                'display_name' => 'Delete Role', // optional
                'description' => 'delete existing  role', // optional
            ] ,
            [
                'name' => 'view-permissions',
                'display_name' => 'View Permissions', // optional
                'description' => 'view existing permissions', // optional
            ],
            [
                'name' => 'create-permission',
                'display_name' => 'Create Permission', // optional
                'description' => 'create new permission', // optional
            ],
            [
                'name' => 'edit-permission',
                'display_name' => 'Edit Permission', // optional
                'description' => 'edit existing  permission', // optional
            ],
            [
                'name' => 'delete-permission',
                'display_name' => 'Delete Permission', // optional
                'description' => 'delete existing  permission', // optional
            ],
              [
                'name' => 'view-posts',
                'display_name' => 'View posts', // optional
                'description' => 'view existing  posts', // optional
            ],
            [
              'name' => 'create-post',
              'display_name' => 'Create post', // optional
              'description' => 'create new  post', // optional
          ],
              [
                'name' => 'edit-post',
                'display_name' => 'Edit post', // optional
                'description' => 'edit existing  post', // optional
            ],
              [
                'name' => 'delete-post',
                'display_name' => 'Delete post', // optional
                'description' => 'delete existing  post', // optional
            ]
        );
    }
}
