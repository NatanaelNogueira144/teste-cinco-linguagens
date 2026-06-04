<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(1)->create([
            'name' => 'Administrador',
            'user_type' => 1,
            'email' => 'admin@cincolinguagensdoamor.com.br',
            'password' => Hash::make('cinco@123')
        ]);
    }
}
