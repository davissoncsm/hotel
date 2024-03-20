<?php

namespace Tests\App\Entities;

use App\Entities\HotelEntity;
use App\Entities\RoomEntity;
use Tests\TestCase;

class HotelEntityTest extends TestCase
{
    public function testHotelEntityFillableAttributes()
    {

        $fillableAttributes = (new HotelEntity())->getFillable();

        $expectedFillableAttributes = [
            'address',
            'city',
            'state',
            'zip_code',
            'website',
        ];

        $this->assertEquals($expectedFillableAttributes, $fillableAttributes);
    }

    public function testHotelEntityHasManyRoomsRelationship()
    {
        $hotel = HotelEntity::factory()->create();
        RoomEntity::factory()->count(3)->create(['hotel_id' => $hotel->id]);
        $rooms = $hotel->rooms;
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $rooms);
        $this->assertCount(3, $rooms);
        $this->assertInstanceOf(RoomEntity::class, $rooms->first());
    }
}
