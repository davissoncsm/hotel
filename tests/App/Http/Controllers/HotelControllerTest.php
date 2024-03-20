<?php

namespace Tests\App\Http\Controllers;

use App\Entities\HotelEntity;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HotelControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndexMethodReturnsView(): void
    {
        $response = $this->get(route('list.hotel'));
        $response->assertStatus(200);
        $response->assertViewIs('hotel.list-hotels');
    }

    public function testCreateMethodReturnsView(): void
    {
        $response = $this->get(route('create.hotel'));
        $response->assertStatus(200);
        $response->assertViewIs('hotel.create-hotel');
    }

    public function testEditMethodRetrievesCorrectDataAndView()
    {
        $hotel = HotelEntity::factory()->create();
        $response = $this->get(route('edit.hotel', ['id' => $hotel->id]));
        $response->assertStatus(200);
        $response->assertViewIs('hotel.edit-hotel');
    }
}
