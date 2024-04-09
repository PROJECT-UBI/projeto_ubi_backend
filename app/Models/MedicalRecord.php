<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function bands(): BelongsTo
    {
        return $this->belongsTo(Band::class);
    }

    public function responsibles(): BelongsToMany
    {
        return $this->belongsToMany(Responsible::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
