<?php

declare(strict_types=1);

namespace Api\Repositories;

use Api\Repositories\Contracts\IHotelRepositoryApi;
use App\Entities\HotelEntity;
use Illuminate\Support\Collection;

class HotelRepositoryApi implements IHotelRepositoryApi
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return HotelEntity::with('rooms')->get();
    }

    /**
     * @param int $id
     * @return object
     */
    public function getById(int $id): object
    {
        return HotelEntity::where('id', $id)->with('rooms')->first();
    }
}
