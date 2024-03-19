<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\RoomEntity;
use App\Repositories\Contracts\IRoomRepository;

class RoomRepository extends BaseRepository implements  IRoomRepository
{
    /**
     * @return string
     */
    public function entity()
    {
        return RoomEntity::class;
    }
}
