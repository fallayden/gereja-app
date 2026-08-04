<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gbiagrammata.org'],
            [
                'name' => 'Admin GBIA Grammata',
                'password' => Hash::make('password'),
            ]
        );
    }
}
