<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'firstName' => "Admin",
            'lastName' => "Admin",
            'phone' => "1234567890",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("password"), // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\ProjectHeader::factory(20)->create();
        \App\Models\ProjectDetail::factory(50)->create();
        \App\Models\TopicSection::factory(100)->create();
        \App\Models\Comment::factory(100)->create();
        \App\Models\Timeline::factory(50)->create();
        \App\Models\FileSection::factory(100)->create();
        \App\Models\Attachment::factory(100)->create();
    }
}
