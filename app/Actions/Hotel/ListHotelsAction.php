<?php

declare(strict_types=1);

namespace App\Actions\Hotel;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IHotelRepository;

class ListHotelsAction extends ActionAbstract
{

    /**
     * instance class
     * @param IHotelRepository $repository
     */
    public function __construct(
        private IHotelRepository $repository,
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
