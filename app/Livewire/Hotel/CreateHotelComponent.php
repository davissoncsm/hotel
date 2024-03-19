<?php

declare(strict_types=1);

namespace App\Livewire\Hotel;

use App\DTOs\HotelDto;
use App\Services\HotelService;
use Livewire\Component;

class CreateHotelComponent extends Component
{
    use SearchZipCodeTrait;

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
     * @var bool
     */
    public bool $enableForm = false;

    public function render()
    {
        return view('livewire.hotel.create-hotel-component');
    }

    /**
     * @return void
     */
    public function save(): void
    {
        $validate = $this->validate();

        $dto = HotelDto::makeFromArray(data: $validate);
        (new HotelService())->store(dto: $dto);

        $this->redirect(route('list.hotel'));
    }

    /**
     * @return void
     */
    public function iDoNotKnowZipCode(): void
    {
        $this->enableForm = true;
    }

    /**
     * @return string[]
     */
    protected function rules(): array
    {
       return [
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
