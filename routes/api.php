<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;

// Rutas para hoteles
Route::prefix('hotels')->group(function () {
    Route::get('/', [HotelController::class, 'index']);  // Obtener todos los hoteles
    Route::post('/', [HotelController::class, 'store']); // Crear un nuevo hotel
    Route::get('{id}', [HotelController::class, 'show']); // Mostrar un hotel específico
    Route::put('{id}', [HotelController::class, 'update']); // Actualizar un hotel
    Route::delete('{id}', [HotelController::class, 'destroy']); // Eliminar un hotel
});

// Rutas para tipos de habitación
Route::prefix('room-types')->group(function () {
    Route::get('/', [RoomTypeController::class, 'index']);  // Obtener todos los tipos de habitación
    Route::post('/', [RoomTypeController::class, 'store']); // Crear un nuevo tipo de habitación
    Route::get('{id}', [RoomTypeController::class, 'show']); // Mostrar un tipo de habitación específico
    Route::put('{id}', [RoomTypeController::class, 'update']); // Actualizar un tipo de habitación
    Route::delete('{id}', [RoomTypeController::class, 'destroy']); // Eliminar un tipo de habitación
});

// Rutas para habitaciones de un hotel específico
Route::prefix('hotels/{hotelId}/rooms')->group(function () {
    Route::get('/', [RoomController::class, 'index']);  // Obtener todas las habitaciones de un hotel
    Route::post('/', [RoomController::class, 'store']); // Crear una habitación en un hotel
    Route::get('{roomId}', [RoomController::class, 'show']); // Mostrar una habitación específica
    Route::delete('{roomId}', [RoomController::class, 'destroy']); // Eliminar una habitación
});
