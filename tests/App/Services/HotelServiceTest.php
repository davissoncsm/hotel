<?php

namespace Tests\App\Services;

use App\DTOs\HotelDto;
use App\Services\HotelService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HotelServiceTest extends TestCase
{
    use DatabaseTransactions;

    private function saveData(): object
    {
        $dto = (new HotelDto(
            address : 'Address hotel',
            city : 'city hotel',
            state : 'state hotel',
            zipCode : 'zipCode hotel',
            website : 'website hotel',
        ));

        return (new HotelService())->store(dto: $dto);
    }

    public function testStoreMethodSavesDataInDatabase()
    {
        $this->saveData();

        $this->assertDatabaseHas('hotels', [
            'address' => 'Address hotel',
        ]);
    }

    public function testUpdateMethodChangeDataInDatabase()
    {
        $hotel = $this->saveData();

        $dto = (new HotelDto(
            address : 'Address update',
            city : 'city update',
            state : 'state update',
            zipCode : 'zipCode update',
            website : 'website update',
            id: $hotel->id
        ));

        (new HotelService())->update(dto: $dto);

        $this->assertDatabaseHas('hotels', [
            'address' => 'Address update',
        ]);
    }

    public function testDeleteMethodChangeDataInDatabase()
    {
        $hotel = $this->saveData();

        (new HotelService())->delete(id: $hotel->id);

        $this->assertDatabaseMissing('hotels', [
            'id' => $hotel->id,
        ]);
    }
}
