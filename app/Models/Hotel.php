<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'address',
        'city',
        'nit',
        'total_rooms',
    ];

    /**
     * Relación uno a muchos con el modelo Room.
     * Un hotel puede tener muchas habitaciones.
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Agregar más métodos si es necesario...
     */
}
