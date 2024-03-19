<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Http\Requests\RoomRequest;

class RoomDto extends Dto
{
    public function __construct(
        public int $hotelId,
        public string $name,
        public string $description,
        public null|int $id = null,
    ){
    }

    /**
     * @param RoomRequest $request
     * @return self
     */
    public static function makeFromRequest(RoomRequest $request): self
    {
        $validate = $request->validated();

        return new self(
            hotelId: $validate['hotelId'],
            name: $validate['name'],
            description: $validate['description'],
            id: isset($validate['roomId']) ? (int)$validate['roomId'] : null
        );
    }

    /**
     * @return array
     */
    public function create(): array
    {
        return [
            'hotel_id' => $this->hotelId,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    /**
     * @return array
     */
    public function update(): array
    {
        return [
            'hotel_id' => $this->hotelId,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
