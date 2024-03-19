<?php

namespace App\Livewire\Room;

use App\Services\RoomService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;

class ListRoomComponent extends Component
{
    public $hotelId;

    public function mount($hotelId):void
    {
        $this->hotelId = $hotelId;
    }

    public function render(): View
    {
        $rooms = $this->get();
        return view('livewire.room.list-room-component', compact('rooms'));
    }

    /**
     * @return array|LengthAwarePaginator
     */
    private function get(): array|LengthAwarePaginator
    {
        return app(RoomService::class)->getByIdHotel(hotelId: $this->hotelId, paginated: true);
    }
}
