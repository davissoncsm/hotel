<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\RoomDto;
use App\Http\Requests\RoomRequest;
use App\Services\RoomService;
use Illuminate\View\View;

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
     * @param int $hotelId
     * @return View
     */
    public function index(int $hotelId): View
    {
        return view('room.list-rooms', compact('hotelId'));
    }

    /**
     * @param int $hotelId
     * @return View
     */
    public function create(int $hotelId): View
    {
        return view('room.create-room', compact('hotelId'));
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $room =  $this->service->getById(id: $id);
        return view('room.edit-room', compact('room'));
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
