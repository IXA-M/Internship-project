<?php

namespace Database\Factories;

use App\Models\Paitent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Paitent>
 */
class PaitentFactory extends Factory
{
    protected $model = Paitent::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'date_of_birth' => fake()->date(),
            'phone_number' => fake()->phoneNumber(),
        ];
    }
}