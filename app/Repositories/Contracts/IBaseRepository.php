<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\DTOs\Dto;
use Illuminate\Pagination\LengthAwarePaginator;

interface IBaseRepository
{
    /**
     * @param bool $paginated
     * @return array|LengthAwarePaginator
     */
    public function getAll(bool $paginated): array|LengthAwarePaginator;

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array;

    /**
     * @param Dto $dto
     * @return object
     */
    public function store(Dto $dto) : object;

    /**
     * @param Dto $dto
     * @return void
     */
    public function update(Dto $dto) : void;

    /**
     * @param int $id
     */
    public function delete(int $id) : void;
}

