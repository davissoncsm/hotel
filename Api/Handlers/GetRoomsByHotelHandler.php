<?php

declare(strict_types=1);

namespace Api\Handlers;

use Api\Services\HotelServiceApi;
use App\Http\Resources\HotelResource;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class GetRoomsByHotelHandler
{

    /**
     * @param int $id
     * @return HotelResource
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(int $id): HotelResource
    {
        $service = app(HotelServiceApi::class)->getById(id: $id);
        return new HotelResource($service);
    }
}
