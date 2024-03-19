<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\HotelDto;
use App\Http\Requests\HotelRequest;
use App\Services\HotelService;


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
     * @return array
     */
    public function index()
    {
        return $this->service->getAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function edit(int $id)
    {
        return $this->service->getById(id: $id);
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
