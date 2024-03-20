<?php

declare(strict_types=1);

namespace Api\Actions;

use Api\Repositories\Contracts\IHotelRepositoryApi;
use Illuminate\Support\Collection;

class GetRoomsBylHotelActions
{
    /**
     * @var int
     */
    private int $id;

    /**
     * class instance
     * @param IHotelRepositoryApi $repositoryApi
     */
    public function __construct(
        private readonly IHotelRepositoryApi $repositoryApi
    ){
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Collection
     */
    public function get(): object
    {
        return $this->repositoryApi->getById(id: $this->id);
    }
}
