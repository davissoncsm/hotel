<?php

namespace Tests\App\Request;

use Tests\TestCase;

class HotelRequestTest extends TestCase
{
    public function testHotelRequestValidationRequiredFields()
    {
        $data = [
            'address' => '',
            'city' => '',
            'state' => '',
            'zipCode' => '',
            'website' => '',
        ];

        $response = $this->postJson(route('store.hotel'), $data);

        $response->assertStatus(422);

    }

    public function testHotelRequestValidationCityShouldBeSize3()
    {
        $data = [
            'address' => '123 Main St',
            'city' => 'Ne',
            'state' => 'NY',
            'zipCode' => '12345678',
            'website' => 'http://example.com',
        ];

        $response = $this->postJson(route('store.hotel'), $data);

        $response->assertStatus(422);

    }

    public function testHotelRequestValidationStateShouldBeSize2()
    {
        $data = [
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NYT',
            'zipCode' => '12345678',
            'website' => 'http://example.com',
        ];

        $response = $this->postJson(route('store.hotel'), $data);

        $response->assertStatus(422);

    }

    public function testHotelRequestValidationZipCodeShouldBeSize8()
    {
        $data = [
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NYT',
            'zipCode' => '123456',
            'website' => 'http://example.com',
        ];

        $response = $this->postJson(route('store.hotel'), $data);

        $response->assertStatus(422);

    }

    public function testHotelRequestValidationWebsiteShouldBeValidUrl()
    {
        $data = [
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NYT',
            'zipCode' => '12345678',
            'website' => 'example.com',
        ];

        $response = $this->postJson(route('store.hotel'), $data);

        $response->assertStatus(422);

    }
}
