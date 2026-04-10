<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (Schema::hasTable('users')) {
            User::updateOrCreate(
                ['email' => 'test@example.com'],
                [
                    'name' => 'Test User',
                    'password' => bcrypt('password'),
                    'image' => 'users/default.jpg',
                    'introduction' => 'これはテストユーザーです。',
                    'email_verified_at' => now(),
                    'remember_token' => null,
                ]
            );
        }

        $this->call([
            CatSeeder::class,
            CategorySeeder::class,
            BlogSeeder::class,
            UserSeeder::class,
        ]);

    }
}
