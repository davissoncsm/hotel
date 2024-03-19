<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Entities\HotelEntity;
use App\Entities\RoomEntity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HotelEntity::factory()->count(10)->create();
        RoomEntity::factory()->count(50)->create();
    }
}
