<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        Flight::create([
            'flight_code' => 'JT610',
            'origin' => 'SUB',
            'destination' => 'CGK',
            'departure_time' => '2025-04-10 08:00:00',
            'arrival_time' => '2025-04-10 09:30:00',
        ]);

        Flight::create([
            'flight_code' => 'GA202',
            'origin' => 'CGK',
            'destination' => 'DPS',
            'departure_time' => '2025-04-11 13:00:00',
            'arrival_time' => '2025-04-11 15:15:00',
        ]);

        Flight::create([
            'flight_code' => 'ID123',
            'origin' => 'BDO',
            'destination' => 'CGK',
            'departure_time' => '2025-04-12 07:30:00',
            'arrival_time' => '2025-04-12 08:20:00',
        ]);

        Flight::create([
            'flight_code' => 'JT345',
            'origin' => 'UPG',
            'destination' => 'SUB',
            'departure_time' => '2025-04-13 10:00:00',
            'arrival_time' => '2025-04-13 12:00:00',
        ]);

        Flight::create([
            'flight_code' => 'AK789',
            'origin' => 'KUL',
            'destination' => 'CGK',
            'departure_time' => '2025-04-14 16:00:00',
            'arrival_time' => '2025-04-14 17:45:00',
        ]);
    }
}
