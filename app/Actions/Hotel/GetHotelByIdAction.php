<?php

declare(strict_types=1);

namespace App\Actions\Hotel;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IHotelRepository;

class GetHotelByIdAction extends ActionAbstract
{

    /**
     * @var int
     */
    private int $hotelId;

    /**
     * instance class
     * @param IHotelRepository $repository
     */
    public function __construct(
        private IHotelRepository $repository,
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
