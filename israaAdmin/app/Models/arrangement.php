<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arrangement extends Model
{
    use HasFactory;
    protected $fillable = [

        'id_hotel',
        'arrangement_labelle',
        'prix',
        
    ];
     /**
     * Get the reservation that owns User.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
