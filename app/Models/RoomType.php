<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // El campo type que puede tener valores como Estándar, Junior, Suite
    ];

    /**
     * Relación con Accommodation
     * Un tipo de habitación puede tener múltiples tipos de acomodaciones.
     */
    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}
