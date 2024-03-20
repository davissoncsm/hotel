<?php

declare(strict_types=1);

namespace Api\Actions;

use Api\Repositories\Contracts\IHotelRepositoryApi;
use Illuminate\Support\Collection;

class GetAllHotelsActions
{
    /**
     * class instance
     * @param IHotelRepositoryApi $repositoryApi
     */
    public function __construct(
        private readonly IHotelRepositoryApi $repositoryApi
    ){
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->repositoryApi->getAll();
    }
}
