<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration' => fake()->unique()->numberBetween(100000000000000, 999999999999999),
            'name' => fake()->name(),
            'specialty_id' => rand(1, 10),
            'email' => fake()->email(),
            'password' => Hash::make(fake()->password(5)),
        ];
    }
}
