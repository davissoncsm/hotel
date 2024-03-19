<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Http\Requests\HotelRequest;

class HotelDto extends Dto
{

    public function __construct(
        public string $address,
        public string $city,
        public string $state,
        public string $zipCode,
        public string $website,
        public null|int $id = null,
    ){
    }

    /**
     * @param HotelRequest $request
     * @return self
     */
    public static function makeFromRequest(HotelRequest $request): self
    {
        $validate = $request->validated();

        return new self(
            address: $validate['address'],
            city: $validate['city'],
            state: $validate['state'],
            zipCode: $validate['zipCode'],
            website: $validate['website'],
            id: isset($validate['hotelId']) ? (int)$validate['hotelId'] : null
        );
    }

    /**
     * @param array $data
     * @return self
     */
    public static function makeFromArray(array $data): self
    {
        return new self(
            address: $data['address'],
            city: $data['city'],
            state: $data['state'],
            zipCode: $data['zipCode'],
            website: $data['website'],
            id: isset($data['hotelId']) ? (int)$data['hotelId'] : null
        );
    }

    /**
     * @return array
     */
    public function create(): array
    {
        return [
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zipCode,
            'website' => $this->website,
        ];
    }

    /**
     * @return array
     */
    public function update(): array
    {
        return [
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zipCode,
            'website' => $this->website,
        ];
    }
}
