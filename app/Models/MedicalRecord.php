<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth',
        'height',
        'weight',
        'blood_type',
        'allergies',
        'medications',
        'diseases',
        'surgeries',
        'observations',
    ];
    
}
