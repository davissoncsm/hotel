<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\DTOs\Dto;

interface IBaseRepository
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array;

    /**
     * @param Dto $dto
     * @return void
     */
    public function store(Dto $dto) : void;

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

