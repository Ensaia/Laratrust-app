<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
        // $super_admin->roles()->attach(['1','2']); 
        // $owner->roles()->attach(['3']); 
    }
}
