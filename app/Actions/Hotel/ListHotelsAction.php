<?php

declare(strict_types=1);

namespace App\Actions\Hotel;

use App\Actions\ActionAbstract;
use App\Repositories\Contracts\IHotelRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ListHotelsAction extends ActionAbstract
{

    /**
     * @var bool
     */
    private bool $paginated = false;

    /**
     * instance class
     * @param IHotelRepository $repository
     */
    public function __construct(
        private IHotelRepository $repository,
    ){
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
        return $this->repository->getAll(paginated:  $this->paginated);
    }
}
