<?php

namespace App\Http\Controllers;

use App\Models\MedicalStaff;
use Illuminate\Support\Facades\Auth;

class MedicalStaffController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $medicalStaff = MedicalStaff::where('user_id', $user->id)->firstOrFail();

        return view('medical-staff', compact('medicalStaff'));
    }
}