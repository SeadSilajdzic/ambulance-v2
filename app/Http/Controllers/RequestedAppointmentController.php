<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestedAppointments\RequestedAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class RequestedAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestedAppointmentRequest $request)
    {
        $usernameExplode = explode(' ', $request->name); //Take users name and remove space
        $usernamePassword = strtolower($usernameExplode[0].$usernameExplode[1]); //Take users name, remove space and join firstname and lastname to string
        $usernameUsername = strtolower($usernameExplode[0] . '_' . $usernameExplode[1]); //Take users name, swap space for dash and put lowercase letters

        $user = User::create([
            'name' => $request->name,
            'username' => $usernameUsername,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($usernamePassword),
            'role_id' => 3
        ]);

        $patient = Patient::create([
            'user_id' => $user->id,
            'alergies' => $request->alergies,
            'birth' => $request->birth,
            'blood_type' => $request->blood_type,
        ]);

        $appointment = Appointment::create([
            'appointment_title' => $request->appointment_title,
            'diagnosis' => $request->diagnosis,
            'appointment_special_note' => $request->note,
            'appointment_statuses_id' => 1,
            'appointment_date' => $request->appointment_date,
        ]);

        $appointment->users()->attach($patient->user_id);

        session()->flush('success', 'Appointment request has been sent!');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
