<?php

namespace App\Http\Requests\AppointmentsRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'appointment_title' => 'required|string|max:255',
            'diagnosis' => 'required|string|max:2000',
            'appointment_special_note' => 'required|string|max:2000',
            'appointment_date' => 'required|date',
            'patient_id' => 'required',
        ];
    }
}
