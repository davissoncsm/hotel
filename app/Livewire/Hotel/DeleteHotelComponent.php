<?php

declare(strict_types=1);

namespace App\Livewire\Hotel;

use App\Services\HotelService;
use Illuminate\View\View;
use Livewire\Component;

class DeleteHotelComponent extends Component
{
    /**
     * @var
     */
    public $id;

    /**
     * @param $id
     * @return void
     */
    public function mount($id): void
    {
        $this->id = $id;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.hotel.delete-hotel-component');
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        app(HotelService::class)->delete($id);
        $this->redirect(route('list.hotel'));
    }
}
