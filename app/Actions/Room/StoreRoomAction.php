<?php

declare(strict_types=1);

namespace App\Actions\Room;

use App\Actions\ActionAbstract;
use App\DTOs\RoomDto;
use App\Repositories\Contracts\IRoomRepository;

class StoreRoomAction extends ActionAbstract
{

    /**
     * @var RoomDto
     */
    private RoomDto $dto;

    /**
     * instance class
     * @param IRoomRepository $repository
     */
    public function __construct(
        private IRoomRepository $repository,
    ){
    }

    /**
     * @param RoomDto $dto
     * @return $this
     */
    public function setDto(RoomDto $dto): static
    {
        $this->dto = $dto;
        return $this;
    }

    /**
     * @return void
     */
    function execute(): void
    {
         $this->repository->store(dto: $this->dto);
    }
}
