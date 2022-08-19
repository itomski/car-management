<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'gender' => 'required',
            'firstname' => 'required|max:25|alpha_dash',
            'lastname' => 'required|max:25|alpha_dash',
            'city' => 'nullable|max:25',
            'street' => 'nullable|max:25',
            'stree_nr' => 'nullable|alpha_num',
            'zip' => 'nullable|alpha_num',
            'country' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'gender.required' => 'Geschlecht muss ausgewählt werden',
            'firstname.required' => 'Ein Vorname MUSS eingegeben werden',
            'lastname.required' => 'Ein Nachname MUSS eingegeben werden'
        ];
    }
}
