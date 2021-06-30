<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', [
            'minDate' => Carbon::tomorrow()->format('Y-m-d'),
        ]);
    }
}
