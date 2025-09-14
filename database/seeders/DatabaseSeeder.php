<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin por defecto
        User::query()->updateOrCreate(
            ['email' => 'lrmaldo@gmail.com'],
            [
                'name' => 'Admin IXXI',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // Contenido demo
        //$this->call(ContentSeeder::class);

        // Información de contacto
        $this->call(ContactInformationSeeder::class);
    }
}
