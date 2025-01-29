<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    // Obtener todos los tipos de habitación
    public function index()
    {
        return RoomType::with('accommodations')->get();
    }

    // Crear un nuevo tipo de habitación
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|unique:room_types',
        ]);

        $roomType = RoomType::create($request->all());

        return response()->json($roomType, 201);
    }

    // Mostrar un tipo de habitación específico
    public function show($id)
    {
        return RoomType::findOrFail($id);
    }

    // Actualizar un tipo de habitación existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|unique:room_types,type,' . $id,
        ]);

        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->all());

        return response()->json($roomType);
    }

    // Eliminar un tipo de habitación
    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();

        return response()->json(['message' => 'Room type deleted']);
    }
}
