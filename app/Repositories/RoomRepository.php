<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\RoomEntity;
use App\Repositories\Contracts\IRoomRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class RoomRepository extends BaseRepository implements  IRoomRepository
{
    /**
     * @return string
     */
    public function entity()
    {
        return RoomEntity::class;
    }

    /**
     * @param int $hotelId
     * @param bool $paginated
     * @return array|LengthAwarePaginator
     */
    public function getByHotelId(int $hotelId, bool $paginated = false): array|LengthAwarePaginator
    {
        $data =  $this->entity->where('hotel_id', $hotelId);

        if($paginated){
            return $data->paginate(10);
        }

        return  $data->get()->toArray();
    }
}
