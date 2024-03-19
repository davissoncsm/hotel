<?php

declare(strict_types=1);

namespace App\Actions\Hotel;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IHotelRepository;

class DeleteHotelAction extends ActionAbstract
{
    /**
     * @var int
     */
    private int $id;

    /**
     * instance class
     * @param IHotelRepository $repository
     */
    public function __construct(
        private IHotelRepository $repository,
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
