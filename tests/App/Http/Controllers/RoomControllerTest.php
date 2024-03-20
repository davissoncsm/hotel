<?php

namespace Tests\App\Http\Controllers;

use App\Entities\HotelEntity;
use App\Entities\RoomEntity;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RoomControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndexMethodReturnsView(): void
    {
        $hotel = HotelEntity::factory()->create();
        $response = $this->get(route('list.rooms', ['id' => $hotel->id]));
        $response->assertStatus(200);
        $response->assertViewIs('room.list-rooms');
    }

    public function testCreateMethodReturnsView(): void
    {
        $hotel = HotelEntity::factory()->create();
        $response = $this->get(route('create.room', ['id' => $hotel->id]));
        $response->assertStatus(200);
        $response->assertViewIs('room.create-room');
    }

    public function testEditMethodRetrievesCorrectDataAndView()
    {
        $room = RoomEntity::factory()->create();
        $response = $this->get(route('edit.room', ['id' => $room->id]));
        $response->assertStatus(200);
        $response->assertViewIs('room.edit-room');
    }
}
