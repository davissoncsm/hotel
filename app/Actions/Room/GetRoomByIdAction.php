<?php

declare(strict_types=1);

namespace App\Actions\Room;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IRoomRepository;

class GetRoomByIdAction extends ActionAbstract
{

    /**
     * @var int
     */
    private int $hotelId;

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
     * @return array
     */
    function execute(): array
    {
        return $this->repository->getById(id: $this->hotelId);
    }
}
