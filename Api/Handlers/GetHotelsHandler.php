<?php

declare(strict_types=1);

namespace Api\Handlers;

use Api\Services\HotelServiceApi;
use App\Http\Resources\HotelResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class GetHotelsHandler
{
    /**
     * @return AnonymousResourceCollection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(): AnonymousResourceCollection
    {
        $service = app(HotelServiceApi::class)->getAll();
        return HotelResource::collection($service);
    }
}
