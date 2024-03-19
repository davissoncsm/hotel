<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\HotelDto;
use App\Http\Requests\HotelRequest;
use App\Services\HotelService;
use Illuminate\View\View;

class HotelController
{
    /**
     * instance class
     * @param HotelService $service
     */
    public function __construct(
        private HotelService $service,
    ){
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('hotel.list-hotels');
    }

    public function create(): View
    {
        return view('hotel.create-hotel');
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $hotel =  $this->service->getById(id: $id);
        return view('hotel.edit-hotel', compact('hotel'));
    }

    /**
     * @param HotelRequest $request
     * @return void
     */
    public function store(HotelRequest $request)
    {
        $dto = HotelDto::makeFromRequest(request: $request);
        $this->service->store(dto: $dto);
    }

    /**
     * @param HotelRequest $request
     * @return void
     */
    public function update(HotelRequest $request)
    {
        $dto = HotelDto::makeFromRequest(request: $request);
        $this->service->update(dto: $dto);
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->service->delete(id: $id);
    }
}
