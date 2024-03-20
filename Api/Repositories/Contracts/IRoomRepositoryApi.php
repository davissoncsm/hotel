<?php

declare(strict_types=1);

namespace Api\Repositories\Contracts;

interface IRoomRepositoryApi
{
    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;
}
