<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'prix',
        'description',
        'nbetoils',
        'adresse',
    ];
    public function arrangements()
    {
        return $this->hasMany(Arrangement::class);
    }
}
