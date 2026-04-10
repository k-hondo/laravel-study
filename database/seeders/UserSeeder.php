<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $now = now();
        $source = database_path('seeders/images/user.jpg');
        $filename = 'users/user1.jpg';

        Storage::disk('public')->put(
            $filename,
            File::get($source)
        );

        DB::table('users')->insert([
            [
                'name' => '木村太郎',
                'image' => $filename,
                'introduction' => '木村太郎です！！よろしくお願いいたします！！！！',
                'email' => 'k_taro@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('taropass'),
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
