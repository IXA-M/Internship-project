<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
        protected $fillable = [
        'room_id',
        'doctor_id',
        'paitent_id',
        'date',
        'time',
        'reason',
    ];
     public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function paitent(): BelongsTo
    {
        return $this->belongsTo(Paitent::class);
    }
}
