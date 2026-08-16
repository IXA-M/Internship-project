<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
use HasFactory;
protected $fillable = ['first_name', 'last_name','specialization','hire_date'];
        
}
