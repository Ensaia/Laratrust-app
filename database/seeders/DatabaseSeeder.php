<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//      $this->call([
//        RoleSeeder::class,
//        PermissionSeeder::class,
//        UserSeeder::class,
//      ]);
        $super_admin = User::create(
            [
                'name' => 'Mohammed Ensaia',
                'email' => 'mohammed@admin.com',
                'is_admin' => '1',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
        );
        $owner = User::create([
            'name' => 'Mohammed Othman',
            'email' => 'mohammed@laravel.com',
            'is_admin' => '1',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        /**
         *
         */
        $super_admin_role = Role::create(
            [
                'name' => 'super-admin',
                'display_name' => 'User Administrator', // optional
                'description' => 'User is allowed to manage all resources', // optional
            ]);

        $admin_role = Role::create([
                'name' => 'admin',
                'display_name' => 'User Administrator', // optional
                'description' => 'User is allowed to manage other users', // optional
            ]);
        $owner_role = Role::create([
                'name' => 'owner',
                'display_name' => 'Post Owner', // optional
                'description' => 'User is the owner of a posts', // optional
            ]);
         $super_admin->roles()->attach([$super_admin_role->id,$admin_role->id]);
         $owner->roles()->attach([$owner_role->id]);

        /***
         *
         */
        Permission::insert(
           [
             [
                'name' => 'view-users',
                'display_name' => 'View Users', // optional
                'description' => 'view existing users', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'create-user',
                'display_name' => 'Create User', // optional
                'description' => 'create new user', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'edit-user',
                'display_name' => 'Edit User', // optional
                'description' => 'edit existing user', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-user',
                'display_name' => 'Delete User', // optional
                'description' => 'delete existing user', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-roles',
                'display_name' => 'View Roles', // optional
                'description' => 'view existing roles', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'create-role',
                'display_name' => 'Create Role', // optional
                'description' => 'create new role', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'edit-role',
                'display_name' => 'Edit Role', // optional
                'description' => 'edit existing  role', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-role',
                'display_name' => 'Delete Role', // optional
                'description' => 'delete existing  role', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ] ,
            [
                'name' => 'view-permissions',
                'display_name' => 'View Permissions', // optional
                'description' => 'view existing permissions', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'create-permission',
                'display_name' => 'Create Permission', // optional
                'description' => 'create new permission', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'edit-permission',
                'display_name' => 'Edit Permission', // optional
                'description' => 'edit existing  permission', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-permission',
                'display_name' => 'Delete Permission', // optional
                'description' => 'delete existing  permission', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-posts',
                'display_name' => 'View posts', // optional
                'description' => 'view existing  posts', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'create-post',
                'display_name' => 'Create post', // optional
                'description' => 'create new  post', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'edit-post',
                'display_name' => 'Edit post', // optional
                'description' => 'edit existing  post', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-post',
                'display_name' => 'Delete post', // optional
                'description' => 'delete existing  post', // optional
                'created_at' => now(),
                'updated_at' => now(),
            ],
           ]
        );
    }
}
