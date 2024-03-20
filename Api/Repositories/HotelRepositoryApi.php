<?php

declare(strict_types=1);

namespace Api\Repositories;

use Api\Repositories\Contracts\IHotelRepositoryApi;
use App\Entities\HotelEntity;
use Exception;
use Illuminate\Support\Collection;

class HotelRepositoryApi implements IHotelRepositoryApi
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return HotelEntity::with('rooms')->get();
    }

    /**
     * @param int $id
     * @return object
     */
    public function getById(int $id): object
    {
        return HotelEntity::where('id', $id)->with('rooms')->first();
    }

    /**
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function create(array $data): object
    {
        return HotelEntity::create([
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip_code' => $data['zipCode'],
            'website' => $data['website'],
        ]);
    }
}
