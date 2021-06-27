<?php

namespace App\Http\Requests\PatientsRequest;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'blood_type' => 'string',
            'birth' => 'string',
            'alergies' => 'string',
            'special_note' => 'string|max:1200',
        ];
    }
}
