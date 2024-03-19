<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'roomId' => $this->route('id')
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
                'hotelId' => 'required|int',
                'name' => 'required',
                'description' => 'required|max:150',
            ],
            'PUT' => [
                'roomId' => 'required|int',
                'hotelId' => 'required|int',
                'name' => 'required',
                'description' => 'required|max:150',
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
            'roomId.required' => 'Obrigatório informar o quarto',
            'name.required' => 'O campo nome é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
            'description.max' => 'O campo descrição deve ter no maximo 150 caracteres',
        ];
    }

}
