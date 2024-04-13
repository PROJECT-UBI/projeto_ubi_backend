<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\MedicalRecord;
 
class User extends Model
{
    use HasFactory;

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
    
}
