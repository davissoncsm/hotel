<?php

namespace App\Livewire\Room;

use App\Services\RoomService;
use Illuminate\View\View;
use Livewire\Component;

class DeleteRoomComponent extends Component
{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $hotelId;

    /**
     * @param $room
     * @return void
     */
    public function mount($room): void
    {
        $this->id = $room['id'];
        $this->hotelId = $room['hotel_id'];
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.room.delete-room-component');
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        app(RoomService::class)->delete(id: $this->id);

        $this->redirect(route('list.rooms', $this->hotelId));
    }
}
