<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface IRoomRepository extends IBaseRepository
{
    /**
     * @param int $hotelId
     * @param bool $paginated
     * @return array|LengthAwarePaginator
     */
    public function getByHotelId(int $hotelId, bool $paginated = false): array|LengthAwarePaginator;
}
