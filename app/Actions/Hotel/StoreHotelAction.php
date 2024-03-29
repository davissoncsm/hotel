<?php

declare(strict_types=1);

namespace App\Actions\Hotel;

use App\Actions\ActionAbstract;
use App\DTOs\HotelDto;
use App\Repositories\Contracts\IHotelRepository;

class StoreHotelAction extends ActionAbstract
{

    /**
     * @var HotelDto
     */
    private HotelDto $dto;

    /**
     * instance class
     * @param IHotelRepository $repository
     */
    public function __construct(
        private IHotelRepository $repository,
    ){
    }

    /**
     * @param HotelDto $dto
     * @return $this
     */
    public function setDto(HotelDto $dto): static
    {
        $this->dto = $dto;
        return $this;
    }

    /**
     * @return object
     */
    function execute(): object
    {
         return $this->repository->store(dto: $this->dto);
    }
}
