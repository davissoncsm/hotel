<?php

declare(strict_types=1);

namespace App\Actions\Room;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IRoomRepository;

class DeleteRoomAction extends ActionAbstract
{
    /**
     * @var int
     */
    private int $id;

    /**
     * instance class
     * @param IRoomRepository $repository
     */
    public function __construct(
        private IRoomRepository $repository,
    ){
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): static
    {
        $this->id = $id;
        return  $this;
    }

    /**
     * @return void
     */
    function execute(): void
    {
         $this->repository->delete(id: $this->id);
    }
}
