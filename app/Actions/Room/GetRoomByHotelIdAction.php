<?php

declare(strict_types=1);

namespace App\Actions\Room;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IRoomRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GetRoomByHotelIdAction extends ActionAbstract
{
    /**
     * @var int
     */
    private int $hotelId;

    /**
     * @var bool
     */
    private bool $paginated = false;

    /**
     * instance class
     * @param IRoomRepository $repository
     */
    public function __construct(
        private IRoomRepository $repository,
    ){
    }

    /**
     * @param int $hotelId
     * @return $this
     */
    public function setHotelId(int $hotelId): static
    {
        $this->hotelId = $hotelId;
        return $this;
    }

    /**
     * @param bool $paginated
     * @return $this
     */
    public function setPaginated(bool $paginated): static
    {
        $this->paginated = $paginated;
        return $this;
    }

    /**
     * @return array|LengthAwarePaginator
     */
    function execute(): array|LengthAwarePaginator
    {
        return $this->repository->getByHotelId(hotelId: $this->hotelId, paginated: $this->paginated);
    }
}
