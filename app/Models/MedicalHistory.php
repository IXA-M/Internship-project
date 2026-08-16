<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;






class MedicalHistory extends Model
{
    use HasFactory;
    
    protected $fillable = ['patient_id','blood_type','allergy','chronic'];

    public function paitent(): BelongsTo
{
        return $this->belongsTo(Paitent::class);
}
      
}
