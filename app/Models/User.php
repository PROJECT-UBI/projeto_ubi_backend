<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, HasMany};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'remember_token',
    ];

    public function medicalRecords(): BelongsToMany
    {
        return $this->belongsToMany(MedicalRecord::class);
    }

    public function bands(): HasMany
    {
        return $this->hasMany(Band::class);
    }
}
