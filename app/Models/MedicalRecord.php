<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function bands(): HasOne
    {
        return $this->hasOne(Band::class,'foreign_key');
    }

    public function responsibles(): BelongsToMany
    {
        return $this->belongsToMany(Responsible::class, 'medical_record_responsibles','medical_record_id','responsible_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
