<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\Hotel\DeleteHotelAction;
use App\Actions\Hotel\GetHotelByIdAction;
use App\Actions\Hotel\ListHotelsAction;
use App\Actions\Hotel\StoreHotelAction;
use App\Actions\Hotel\UpdateHotelAction;
use App\DTOs\HotelDto;
use Illuminate\Pagination\LengthAwarePaginator;

class HotelService
{
    /**
     * Retrieve all hotels
     * @param bool $paginated
     * @return array|LengthAwarePaginator
     */
    public function getAll(bool $paginated = false): array|LengthAwarePaginator
    {
        return app(ListHotelsAction::class)
            ->setPaginated(paginated: $paginated)
            ->execute();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return app(GetHotelByIdAction::class)
            ->setHotelId(hotelId: $id)
            ->execute();
    }

    /**
     * Create a new hotel
     * @param HotelDto $dto
     * @return void
     */
    public function store(HotelDto $dto): void
    {
        app(StoreHotelAction::class)
            ->setDto(dto: $dto)
            ->execute();
    }

    /**
     * Update a hotel
     * @param HotelDto $dto
     * @return void
     */
    public function update(HotelDto $dto): void
    {
        app(UpdateHotelAction::class)
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
        app(DeleteHotelAction::class)
            ->setId(id: $id)
            ->execute();
    }

}
