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
            'patients' => Patient::all()->count(),
            'users' => User::all()->count(),
            'appointments' => Appointment::all()->count(),
            'appointmentRequests' => Appointment::
                where('appointment_title', NULL)
                ->orWhere('appointment_date', NULL)
                ->orWhere('appointment_approved', 0)
                ->count(),
            'appointmentsReadyToWorkOn' => Appointment::
                where('appointment_title', '!=', NULL)
                ->where('appointment_special_note', '!=', NULL)
                ->where('appointment_date', '!=', NULL)
                ->where('appointment_approved', 1)
                ->count(),
        ]);
    }
}
