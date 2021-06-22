<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceptionUpdateAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reception.index', [
            'appointments' => Appointment::with('users')
                ->where('appointment_title', NULL)
                ->orwhere('appointment_date', NULL)
                ->orWhere('appointment_approved', 0)
                ->paginate(15)
        ]);
    }

    public function appointment_approve(Appointment $appointment)
    {
        if ($appointment->appointment_approved == 0) {
            $appointment->appointment_approved = 1;
            $appointment->save();
        } else {
            $appointment->appointment_approved = 0;
            $appointment->save();
        };

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $appointment->load('user');
        return view('admin.reception.edit', [
            'appointment' => $appointment
        ]);
    }

    public function update(ReceptionUpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->appointment_title = $request->appointment_title;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->save();

        return redirect()->route('reception.index');
    }
}
