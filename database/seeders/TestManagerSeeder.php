<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Brandon',
            'last_name' => 'Idun-Tawiah',
            'email' => 'biduntawiah@gmail.com',
            'password' =>  Hash::make('Iaminclass6'),
        ]);
    }
}
