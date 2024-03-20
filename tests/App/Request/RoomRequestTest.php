<?php

namespace Tests\App\Request;

use Tests\TestCase;

class RoomRequestTest extends TestCase
{
    public function testHotelRequestValidationRequiredFields()
    {
        $data = [
            'hotelId' => '',
            'name' => '',
            'description' => '',
        ];

        $response = $this->postJson(route('store.room'), $data);

        $response->assertStatus(422);

    }

    public function testHotelRequestValidationFieldHotelIdShouldBeInteger()
    {
        $data = [
            'hotelId' => 'A',
            'name' => 'TESTE',
            'description' => 'TESTE',
        ];

        $response = $this->postJson(route('store.room'), $data);

        $response->assertStatus(422);

    }

}
