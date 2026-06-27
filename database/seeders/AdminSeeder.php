<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Boby Regielma Ginting',
            'username' => 'adminmbg',
            'password' => Hash::make('rahasia123'), // Password di-hash demi keamanan
        ]);
    }
}
