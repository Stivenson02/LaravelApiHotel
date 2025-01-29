<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Obtener todas las habitaciones de un hotel
    public function index($hotelId)
    {
        return Hotel::findOrFail($hotelId)->rooms;
    }

    // Crear una habitación en un hotel
    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'accommodation' => 'required|in:Sencilla,Doble,Triple,Cuádruple',
            'quantity' => 'required|integer',
        ]);

        $hotel = Hotel::findOrFail($hotelId);

        // Validar que la cantidad de habitaciones no supere el total
        $totalAssignedRooms = $hotel->rooms()->sum('quantity');
        if ($totalAssignedRooms + $request->quantity > $hotel->total_rooms) {
            return response()->json(['message' => 'Cannot exceed total rooms'], 400);
        }

        // Validar tipos de habitación y acomodación
        $roomType = RoomType::findOrFail($request->room_type_id);
        $validAccommodations = [
            'Estándar' => ['Sencilla', 'Doble'],
            'Junior' => ['Triple', 'Cuádruple'],
            'Suite' => ['Sencilla', 'Doble', 'Triple'],
        ];

        if (!in_array($request->accommodation, $validAccommodations[$roomType->type])) {
            return response()->json(['message' => 'Invalid accommodation for room type'], 400);
        }

        $room = $hotel->rooms()->create([
            'room_type_id' => $request->room_type_id,
            'accommodation' => $request->accommodation,
            'quantity' => $request->quantity,
        ]);

        return response()->json($room, 201);
    }

    // Mostrar una habitación específica
    public function show($hotelId, $roomId)
    {
        return Hotel::findOrFail($hotelId)->rooms()->findOrFail($roomId);
    }

    // Eliminar una habitación
    public function destroy($hotelId, $roomId)
    {
        $room = Hotel::findOrFail($hotelId)->rooms()->findOrFail($roomId);
        $room->delete();

        return response()->json(['message' => 'Room deleted']);
    }
}

