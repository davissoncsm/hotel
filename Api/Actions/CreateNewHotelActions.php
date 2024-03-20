<?php

declare(strict_types=1);

namespace Api\Actions;

use Api\Repositories\Contracts\IHotelRepositoryApi;
use Illuminate\Support\Collection;

class CreateNewHotelActions
{
    /**
     * @var array
     */
    private array $data;

    /**
     * class instance
     * @param IHotelRepositoryApi $repositoryApi
     */
    public function __construct(
        private readonly IHotelRepositoryApi $repositoryApi
    ){
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return object
     */
    public function create(): object
    {
        return $this->repositoryApi->create(data: $this->data);
    }
}
