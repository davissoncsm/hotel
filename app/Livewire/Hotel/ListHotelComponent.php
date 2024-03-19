<?php

namespace App\Livewire\Hotel;

use App\Services\HotelService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;

class ListHotelComponent extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        $hotels = $this->getHotelsList();
        return view('livewire.hotel.list-hotel-component', compact('hotels'));
    }

    /**
     * @return array|LengthAwarePaginator
     */
    private function getHotelsList(): array|LengthAwarePaginator
    {
        return (new HotelService())->getAll(paginated: true);
    }
}
