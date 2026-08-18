<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => (string) fake()->numberBetween(3000, 20000),
            'employer_id' => Employer::factory(),
        ];
    }
}