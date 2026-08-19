<?php

namespace Database\Factories;

use App\Models\MedicalStaff;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalStaffFactory extends Factory
{
    protected $model = MedicalStaff::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type' => fake()->randomElement(['doctor', 'nurse']),
        ];
    }
}