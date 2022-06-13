<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'labelle_Service',
        'etat',
        'prenom',
        'nom',
        'portable',
        'adresse',
    ];
     /**
     * Get the reservation that owns User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
