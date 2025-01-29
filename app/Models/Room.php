<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'room_type_id',
        'accommodation',
        'quantity',
    ];

    /**
     * Relación inversa con el modelo Hotel.
     * Una habitación pertenece a un hotel.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Relación con el modelo RoomType.
     * Una habitación tiene un tipo de habitación.
     */
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}

