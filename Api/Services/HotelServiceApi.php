<?php

declare(strict_types=1);

namespace Api\Services;

use Api\Actions\GetAllHotelsActions;
use Api\Actions\GetRoomsBylHotelActions;
use Illuminate\Support\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class HotelServiceApi
{
    /**
     * @return Collection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getAll(): Collection
    {
        return app(GetAllHotelsActions::class)->get();
    }

    /**
     * @param int $id
     * @return object
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getById(int $id): object
    {
        return app(GetRoomsBylHotelActions::class)->setId(id: $id)->get();
    }
}
