<?php

declare(strict_types=1);

namespace App\DTOs;

abstract class Dto
{
    /**
     * @return array
     */
    abstract public function create(): array;

    /**
     * @return array
     */
    abstract public function update(): array;
}
