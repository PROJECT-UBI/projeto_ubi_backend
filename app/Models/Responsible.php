<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Responsible extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'phone2',
        'email',
    ];

    public function medical_records(): BelongsToMany
    {
        return $this->belongsToMany(MedicalRecord::class, 'medical_record_responsibles','responsible_id','medical_record_id');
    }
}
