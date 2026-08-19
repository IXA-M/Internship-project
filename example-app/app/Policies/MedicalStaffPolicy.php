<?php

namespace App\Policies;

use App\Models\MedicalStaff;
use App\Models\User;

class MedicalStaffPolicy
{
    public function viewMedicalPage(User $user, MedicalStaff $medicalStaff): bool
    {
       switch ($medicalStaff->type) {
    case 'nurse':
        return $medicalStaff->user_id === $user->id;

    case 'doctor':
        return $medicalStaff->user_id === $user->id;

    default:
        abort(404);
}
    }
    
}