<?php

namespace Tests\App\Services;

use App\DTOs\RoomDto;
use App\Entities\HotelEntity;
use App\Services\RoomService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RoomServiceTest extends TestCase
{
    use DatabaseTransactions;

    private function getHotel(): object
    {
        return HotelEntity::find(1);
    }

    private function saveData(): object
    {
        $hotel = $this->getHotel();

        $dto = (new RoomDto(
            hotelId: $hotel->id,
            name: 'Room name',
            description: 'description name'
        ));

        return (new RoomService())->store(dto: $dto);
    }

    public function testStoreMethodSavesDataInDatabase()
    {
        $this->saveData();

        $this->assertDatabaseHas('rooms', [
            'name' => 'Room name',
        ]);
    }

    public function testUpdateMethodChangeDataInDatabase()
    {
        $room = $this->saveData();

        $dto = (new RoomDto(
            hotelId: $room->hotel_id,
            name: 'Room update',
            description: 'description update',
            id: $room->id
        ));

        (new RoomService())->update(dto: $dto);

        $this->assertDatabaseHas('rooms', [
            'name' => 'Room update',
        ]);
    }

    public function testDeleteMethodChangeDataInDatabase()
    {
        $room = $this->saveData();

        (new RoomService())->delete(id: $room->id);

        $this->assertDatabaseMissing('rooms', [
            'id' => $room->id,
        ]);
    }
}
