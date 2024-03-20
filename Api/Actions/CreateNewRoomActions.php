<?php

declare(strict_types=1);

namespace Api\Actions;

use Api\Repositories\Contracts\IRoomRepositoryApi;

class CreateNewRoomActions
{
    /**
     * @var array
     */
    private array $data;

    /**
     * @param IRoomRepositoryApi $repositoryApi
     */
    public function __construct(
        private readonly IRoomRepositoryApi $repositoryApi
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
