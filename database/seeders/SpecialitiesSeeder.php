<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialty::insert([
            [
                'specialty' => 'Ortopedista',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Oculista',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Cardiologista',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Dermatologista',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Pediatra',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Ginecologista',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Neurologista',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Psiquiatra',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Endocrinologista',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'specialty' => 'Otorrinolaringologista',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
