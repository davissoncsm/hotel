<?php

declare(strict_types=1);

namespace Api\Repositories;

use Api\Repositories\Contracts\IRoomRepositoryApi;
use App\Entities\RoomEntity;
use Exception;

class RoomRepositoryApi implements IRoomRepositoryApi
{

    /**
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function create(array $data): object
    {
        return RoomEntity::create([
            'hotel_id' => $data['hotelId'],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }
}
