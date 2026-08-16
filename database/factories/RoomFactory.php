<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Room>
 */
class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition(): array
    {
        return [
            'room_number' => fake()->numberBetween(100, 999),
            'building_wing' => fake()->randomElement([
                'A',
                'B',
                'C',
                'D',
            ]),
        ];
    }
}