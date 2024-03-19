<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\Room\DeleteRoomAction;
use App\Actions\Room\GetRoomByIdAction;
use App\Actions\Room\ListRoomAction;
use App\Actions\Room\StoreRoomAction;
use App\Actions\Room\UpdateRoomAction;
use App\DTOs\RoomDto;

class RoomService
{
    /**
     * Retrieve all hotels
     * @return array
     */
    public function getAll(): array
    {
        return app(ListRoomAction::class)->execute();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return app(GetRoomByIdAction::class)
            ->setHotelId(hotelId: $id)
            ->execute();
    }

    /**
     * Create a new hotel
     * @param RoomDto $dto
     * @return void
     */
    public function store(RoomDto $dto): void
    {
        app(StoreRoomAction::class)
            ->setDto(dto: $dto)
            ->execute();
    }

    /**
     * Update a hotel
     * @param RoomDto $dto
     * @return void
     */
    public function update(RoomDto $dto): void
    {
        app(UpdateRoomAction::class)
            ->setDto(dto: $dto)
            ->execute();
    }

    /**
     * Remove a hotel
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        app(DeleteRoomAction::class)
            ->setId(id: $id)
            ->execute();
    }
}
