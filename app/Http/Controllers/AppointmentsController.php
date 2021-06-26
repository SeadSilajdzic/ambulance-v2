<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentsRequest\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appointments.index', [
            'appointments' => Appointment::with('users')
                ->where('appointment_title', '!=', NULL)
                ->where('appointment_special_note', '!=', NULL)
                ->where('appointment_date', '!=', NULL)
                ->where('appointment_approved', 1)
                ->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointments.create', [
            'patients' => Patient::with('user')->get(),
            'minDate' => Carbon::tomorrow()->format('Y-m-d')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create([
            'appointment_title' => $request->appointment_title,
            'diagnosis' => $request->diagnosis,
            'appointment_special_note' => $request->appointment_special_note,
            'appointment_statuses_id' => 1,
            'appointment_date' => $request->appointment_date,
            'appointment_approved' => 1
        ]);

        $appointment->users()->attach($request->patient_id);

        session()->flash('success', 'Appointment has been created successfully!');
        return redirect()->route('appointments.index');
    }

    public function emr($id)
    {
        $user = User::withoutTrashed()->with(['appointments', 'appointments.appointmentStatus'])->where('id', $id)->firstOrFail();
        return view('admin.patients.emr', [
            'user' => $user,
        ]);
    }

    public function emr_show(Appointment $appointment)
    {
        $appointment->load('users');
        return view('admin.patients.emr_show', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
