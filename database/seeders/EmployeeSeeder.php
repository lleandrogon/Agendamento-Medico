<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            [
                'registration' => '28092004',
                'name' => 'Leandro Gonçalves',
                'email' => 'lleandrogon2004@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'registration' => '01012025',
                'name' => 'Usuario',
                'email' => 'usuario@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
