<?php

namespace Database\Factories;

use App\Models\MedicalHistory;
use App\Models\Paitent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MedicalHistory>
 */
class MedicalHistoryFactory extends Factory
{
    protected $model = MedicalHistory::class;

    public function definition(): array
    {
        return [
            'paitent_id' => Paitent::factory(),

            'blood_type' => fake()->randomElement([
                'A+',
                'A-',
                'B+',
                'B-',
                'AB+',
                'AB-',
                'O+',
                'O-',
            ]),

            'allergy' => fake()->randomElement([
                'None',
                'Penicillin',
                'Peanuts',
                'Dust',
                'Pollen',
            ]),

            'chronic' => fake()->randomElement([
                'None',
                'Diabetes',
                'Asthma',
                'Hypertension',
                'Arthritis',
            ]),
        ];
    }
}