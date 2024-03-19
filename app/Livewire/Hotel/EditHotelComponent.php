<?php

namespace App\Livewire\Hotel;

use App\DTOs\HotelDto;
use App\Services\HotelService;
use Illuminate\View\View;
use Livewire\Component;

class EditHotelComponent extends Component
{
    use  SearchZipCodeTrait;

    /**
     * @var
     */
    public $hotelId;
    /**
     * @var
     */
    public $zipCode;

    /**
     * @var
     */
    public $address;

    /**
     * @var
     */
    public $city;

    /**
     * @var
     */
    public $state;

    /**
     * @var
     */
    public $website;


    /**
     * @param $hotel
     * @return void
     */
    public function mount($hotel): void
    {
        $this->hotelId = $hotel['id'];
        $this->address = $hotel['address'];
        $this->city = $hotel['city'];
        $this->state = $hotel['state'];
        $this->zipCode = $hotel['zip_code'];
        $this->website = $hotel['website'];
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.hotel.edit-hotel-component');
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $validate = $this->validate();

        $dto = HotelDto::makeFromArray(data: $validate);
        (new HotelService())->update(dto: $dto);

        $this->redirect(route('list.hotel'));
    }

    /**
     * @return string[]
     */
    protected function rules(): array
    {
        return [
            'hotelId' => 'required|int',
            'address' => 'required',
            'city' => 'required|min:3',
            'state' => 'required|size:2',
            'zipCode' => 'required|size:8',
            'website' => 'required|url',
        ];
    }

    /**
     * @return array
     */
    protected function messages(): array
    {
        return [
            'hotelId.required' => 'Obrigatório informar o hotel',
            'address.required' => 'O campo endereço é obrigatório',
            'city.required' => 'O campo cidade é obrigatório',
            'city.min' => 'O campo cidade deve ter pelo menos 3 caracteres',
            'state.required' => 'O campo estado é obrigatório',
            'state.size' => 'O campo estado deve conter 2 caracteres',
            'zipCode.required' => 'O campo cep é obrigatório',
            'zipCode.size' => 'O campo cep deve conter 8 caracteres',
            'website.required' => 'O campo website é obrigatório',
            'website.url' => 'O campo website deve ser uma url válida',
        ];
    }
}
