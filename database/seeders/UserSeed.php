<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([
            'email' => 'carlosanselmi2@gmail.com',
        ], [
            'name' => 'carlos',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);

        $user->assignRole('admin');

        $user = User::updateOrCreate([
            'email' => 'adrianahherediaj@outlook.com',
        ], [
            'name' => 'Adrina Heredia',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);

        $user->assignRole('admin');
    }
}
