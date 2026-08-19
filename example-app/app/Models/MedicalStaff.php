<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalStaff extends Model
{
    /** @use HasFactory<\Database\Factories\MedicalStaffFactory> */
    use HasFactory;
    protected $fillable = ['type','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
