<?php

namespace Api\Validation;

use Illuminate\Foundation\Http\FormRequest;

class HotelValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
           'hotel' => 'required|array',
           'hotel.address' => 'required',
           'hotel.city' => 'required|min:3',
           'hotel.state' => 'required|size:2',
           'hotel.zipCode' => 'required|size:8',
           'hotel.website' => 'required|url',
           'rooms' => 'required|array',
           'rooms.*.name' => 'required',
           'rooms.*.description' => 'required|max:500',
       ];
    }

}
