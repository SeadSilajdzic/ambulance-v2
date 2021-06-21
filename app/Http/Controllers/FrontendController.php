<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestedAppointments\RequestedAppointmentRequest;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
}
