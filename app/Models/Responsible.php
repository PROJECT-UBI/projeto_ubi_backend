<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\MedicalRecord;
 
class Responsible extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'phone2',
        'email',
    ];
  
    public function medicalRecords(): BelongsToMany
    {
        return $this->belongsToMany(MedicalRecord::class);
    }
}
