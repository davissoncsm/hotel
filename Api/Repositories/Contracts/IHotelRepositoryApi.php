<?php

declare(strict_types=1);

namespace Api\Repositories\Contracts;

use Illuminate\Support\Collection;

interface IHotelRepositoryApi
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param int $id
     * @return object
     */
    public function getById(int $id): object;

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;
}
