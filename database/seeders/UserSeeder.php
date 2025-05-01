<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'login' => 'admin',
            'name' => 'Anthony Gomez',
            'email' => 'anthonyansoni24@gmail.com',
            'celular' => '76537648',
            'password' => bcrypt('5987964'),
            'estado' => 1,
        ])->assignRole('admin');

        // User::factory(2)->create();
    }
}
