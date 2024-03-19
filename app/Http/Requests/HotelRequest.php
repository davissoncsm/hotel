<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    public function prepareForValidation(): void
    {
        $this->merge([
            'hotelId' => $this->route('id')
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return match ($this->method()){
            'POST' =>[
                'address' => 'required',
                'city' => 'required|min:3',
                'state' => 'required|size:2',
                'zipCode' => 'required|size:8',
                'website' => 'required|url',
            ],
            'PUT' => [
                'hotelId' => 'required|int',
                'address' => 'required',
                'city' => 'required|min:3',
                'state' => 'required|size:2',
                'zipCode' => 'required|size:8',
                'website' => 'required|url',
            ],
        };
    }


    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'hotelId.required' => 'Obrigatório informar o hotel',
            'address.required' => 'O campo endereço é obrigatório',
            'city.required' => 'O campo cidade é obrigatório',
            'city.min' => 'O campo cidade deve ter pelo menos 3 caracteres',
            'state.required' => 'O campo estado é obrigatório',
            'state.size' => 'O campo estado deve conter 2 caracteres',
            'zipCode.required' => 'O campo cep é obrigatório',
            'zipCode.size' => 'O campo cep deve conter 2 caracteres',
            'website.required' => 'O campo website é obrigatório',
            'website.url' => 'O campo website deve ser uma url válida',
        ];
    }

}
