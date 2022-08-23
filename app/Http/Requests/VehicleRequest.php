<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand' => ['required', 'max:25'],
            'type' => 'required|max:25',
            'registration' => 'required|min:6|max:20',
            'description' => 'required|min:2',
            'img' => 'required|mimes:jpeg,png,gif,jpg|max:2048',
        ];
    }

    // Feldnamen für die Fehlerausgabe anpassen
    public function attributes()
    {
        return [
            'brand' => 'Marke',
            'img' => 'Bild',
        ];
    }

    public function messages()
    {
        return [
            'brand.required' => 'Die :attribute muss eingegeben werden',
            'brand.max' => 'Die :attribute ist zu lang. Maximale Länge ist :max Zeichen.',
            'img.required' => 'Ein :attribute muss eingegeben werden',
        ];
    }
}
