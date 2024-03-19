<?php

namespace App\Livewire\Room;

use App\DTOs\RoomDto;
use App\Services\RoomService;
use Illuminate\View\View;
use Livewire\Component;

class EditRoomComponent extends Component
{
    /**
     * @var
     */
    public $hotelId;

    /**
     * @var
     */
    public $roomId;

    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $description;

    /**
     * @param $room
     * @return void
     */
    public function mount($room): void
    {
        $this->roomId = $room['id'];
        $this->hotelId = $room['hotel_id'];
        $this->name = $room['name'];
        $this->description = $room['description'];
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.room.edit-room-component');
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $validate = $this->validate();

        $dto = RoomDto::makeFromArray(data: $validate);
        (new RoomService())->update(dto: $dto);

        $this->redirect(route('list.rooms', $this->hotelId));
    }

    /**
     * @return string[]
     */
    protected function rules(): array
    {
        return [
            'roomId' => 'required|int',
            'hotelId' => 'required|int',
            'name' => 'required',
            'description' => 'required|max:500',
        ];
    }

    /**
     * @return array
     */
    protected function messages(): array
    {
        return [
            'hotelId.required' => 'Obrigatório informar o hotel',
            'roomId.required' => 'Obrigatório informar o quarto',
            'name.required' => 'O campo nome é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
            'description.max' => 'O campo descrição deve ter no maximo 500 caracteres',
        ];
    }

}
