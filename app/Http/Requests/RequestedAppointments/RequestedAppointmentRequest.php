<?php

namespace App\Http\Requests\RequestedAppointments;

use Illuminate\Foundation\Http\FormRequest;

class RequestedAppointmentRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'note' => 'required|string|max:2000',
            'birth' => 'required|date',
            'alergies' => 'string',
            'blood_type' => 'string|max:3'
        ];
    }
}
