<?php

declare(strict_types=1);

namespace Api\Handlers;

use Api\Services\HotelServiceApi;
use Api\Validation\HotelValidation;
use Exception;

class CreateHotelHandler
{
    /**
     * @param HotelValidation $request
     * @return void
     * @throws Exception
     */
    public function __invoke(HotelValidation $request): void
    {
        app(HotelServiceApi::class)->create(data: $request->all());
    }
}
