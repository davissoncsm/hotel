<?php

declare(strict_types=1);

namespace App\Actions\Room;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IRoomRepository;

class ListRoomAction extends ActionAbstract
{

    /**
     * instance class
     * @param IRoomRepository $repository
     */
    public function __construct(
        private IRoomRepository $repository,
    ){
    }

    /**
     * @return array
     */
    function execute(): array
    {
        return $this->repository->getAll();
    }
}
