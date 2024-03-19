<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\RoomDto;
use App\Http\Requests\RoomRequest;
use App\Services\RoomService;

class RoomController
{
    /**
     * instance class
     * @param RoomService $service
     */
    public function __construct(
        private RoomService $service,
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
     * @param RoomRequest $request
     * @return void
     */
    public function store(RoomRequest $request)
    {
        $dto = RoomDto::makeFromRequest(request: $request);
        $this->service->store(dto: $dto);
    }

    /**
     * @param RoomRequest $request
     * @return void
     */
    public function update(RoomRequest $request)
    {
        $dto = RoomDto::makeFromRequest(request: $request);
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
