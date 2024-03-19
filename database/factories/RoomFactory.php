<?php

namespace Database\Factories;

use App\Entities\HotelEntity;
use App\Entities\RoomEntity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class RoomFactory extends Factory
{
    protected $model = RoomEntity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => fake()->numberBetween(1,  HotelEntity::count()),
            'name' => fake()->name(),
            'description' => fake()->text(),
        ];
    }
}
