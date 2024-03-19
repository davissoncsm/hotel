<?php

declare(strict_types=1);

namespace App\Livewire\Room;

use App\DTOs\RoomDto;
use App\Services\RoomService;
use Illuminate\View\View;
use Livewire\Component;

class CreateRoomComponent extends Component
{

    /**
     * @var
     */
    public $hotelId;

    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $description;

    /**
     * @param $hotelId
     * @return void
     */
    public function mount($hotelId): void
    {
        $this->hotelId = $hotelId;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.room.create-room-component');
    }

    /**
     * @return void
     */
    public function save(): void
    {
        $validate = $this->validate();

        $dto = RoomDto::makeFromArray(data: $validate);
        (new RoomService())->store(dto: $dto);

        $this->redirect(route('list.rooms', $this->hotelId));
    }

    /**
     * @return string[]
     */
    protected function rules(): array
    {
        return [
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
