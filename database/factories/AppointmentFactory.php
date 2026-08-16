<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Paitent;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition(): array
    {
        return [
            'room_id' => Room::factory(),
            'doctor_id' => Doctor::factory(),
            'paitent_id' => Paitent::factory(),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'reason' => fake()->sentence(),
        ];
    }
}