<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    // Obtener todos los hoteles
    public function index()
    {
        return Hotel::all();
    }

    // Crear un nuevo hotel
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'nit' => 'required|string|max:255',
            'total_rooms' => 'required|integer',
        ]);

        try {
            // Crear el hotel
            $hotel = Hotel::create([
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'nit' => $request->nit,
                'total_rooms' => $request->total_rooms,
            ]);

            return response()->json($hotel, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el hotel', 'message' => $e->getMessage()], 500);
        }
    }

    // Mostrar un hotel específico
    public function show($id)
    {
        return Hotel::findOrFail($id);
    }

    // Actualizar un hotel existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:hotels,name,' . $id,
            'address' => 'required',
            'city' => 'required',
            'nit' => 'required|unique:hotels,nit,' . $id,
            'total_rooms' => 'required|integer',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

        return response()->json($hotel);
    }

    // Eliminar un hotel
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return response()->json(['message' => 'Hotel deleted']);
    }
}
