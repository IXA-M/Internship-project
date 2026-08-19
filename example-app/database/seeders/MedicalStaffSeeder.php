<?php

namespace Database\Seeders;

use App\Models\MedicalStaff;
use App\Models\User;
use Illuminate\Database\Seeder;

class MedicalStaffSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = User::factory()->create([
            'name' => 'Doctor User',
        ]);

        MedicalStaff::create([
            'user_id' => $doctor->id,
            'type' => 'doctor',
        ]);

        $nurse = User::factory()->create([
            'name' => 'Nurse User',
        ]);

        MedicalStaff::create([
            'user_id' => $nurse->id,
            'type' => 'nurse',
        ]);
    }
}