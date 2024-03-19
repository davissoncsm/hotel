<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\HotelEntity;
use App\Repositories\Contracts\IHotelRepository;

class HotelRepository extends BaseRepository implements  IHotelRepository
{
    /**
     * @return string
     */
    public function entity()
    {
        return HotelEntity::class;
    }
}
