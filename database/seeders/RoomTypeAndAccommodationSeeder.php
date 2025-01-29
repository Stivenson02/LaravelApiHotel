<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use App\Models\Accommodation;

class RoomTypeAndAccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definimos los datos
        $roomTypes = [
            'Estándar' => ['Sencilla', 'Doble'],
            'Junior' => ['Triple', 'Cuádruple'],
            'Suite' => ['Sencilla', 'Doble', 'Triple'],
        ];

        foreach ($roomTypes as $roomType => $accommodations) {
            // Crear RoomType
            $roomTypeModel = RoomType::create([
                'type' => $roomType,
            ]);

            // Crear sus Accommodations
            foreach ($accommodations as $type) {
                Accommodation::create([
                    'room_type_id' => $roomTypeModel->id,
                    'type' => $type,
                ]);
            }
        }
    }
}
