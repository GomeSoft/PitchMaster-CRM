<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            "name" => Str::random(10),
            "email" => Str::random(10).'@gmail.com',
            "password" => Hash::make("password"),
        ]);
    }
}
