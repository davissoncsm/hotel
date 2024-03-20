<?php

namespace Tests\App\Entities;

use App\Entities\HotelEntity;
use App\Entities\RoomEntity;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RoomEntityTest extends TestCase
{
    use DatabaseTransactions;

    public function testHotelEntityFillableAttributes()
    {

        $fillableAttributes = (new RoomEntity())->getFillable();

        $expectedFillableAttributes = [
            'hotel_id',
            'name',
            'description',
        ];

        $this->assertEquals($expectedFillableAttributes, $fillableAttributes);
    }



    public function testRoomModelBelongsToHotelRelationship()
    {
        $hotel = HotelEntity::factory()->create();
        $room = RoomEntity::factory()->create(['hotel_id' => $hotel->id]);
        $associatedHotel = $room->hotel;
        $this->assertInstanceOf(HotelEntity::class, $associatedHotel);
        $this->assertEquals($hotel->id, $associatedHotel->id);
    }
}
