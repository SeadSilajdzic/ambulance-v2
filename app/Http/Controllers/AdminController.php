<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\RequestedAppointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'patients' => Patient::all(),
            'users' => User::all(),
            'appointmentRequests' => Appointment::where('appointment_title', NULL)->orWhere('appointment_date', NULL)->orWhere('appointment_approved', 0)->get(),
            'appointments' => Appointment::all(),
        ]);
    }
}
