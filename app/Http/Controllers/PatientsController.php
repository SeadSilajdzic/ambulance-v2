<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientsRequest\EditPatientRequest;
use App\Http\Requests\PatientsRequest\StorePatientRequest;
use App\Http\Requests\UsersRequest\EditUserRequest;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.patients.index', [
            'patients' => User::withoutTrashed()->where('role_id', 3)->with('patient')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create', [
            'roles' => Role::where('id', '==', 3)->get(),
            'maxDate' => Carbon::today()->format('Y-m-d'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        if($request->slug)
        {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->name);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role_id' => 3,
            'phone' => $request->phone,
            'slug' => $slug
        ]);

        Patient::create([
            'user_id' => $user->id,
            'blood_type' => $request->blood_type,
            'birth' => $request->birth,
            'alergies' => $request->alergies,
            'special_note' => $request->special_note
        ]);

        return redirect()->route('patients.index')->withToastSuccess('Patient has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $patient)
    {
        $patient->load('patient');
        return view('admin.patients.show', [
            'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $patient)
    {
        $patient->load('patient');
        return view('admin.patients.edit', [
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPatientRequest $request, Patient $patient, EditUserRequest $userRequest)
    {
        $user = User::where('id', $patient->user_id)->firstOrFail();
        if($userRequest->slug)
        {
            $slug = Str::slug($userRequest->slug);
        } else {
            $slug = Str::slug($userRequest->name);
        }

        $user->name = $userRequest->name;
        $user->email = $userRequest->email;
        $user->username = $userRequest->username;
        $user->phone = $userRequest->phone;
        $user->slug = $slug;

        if($userRequest->input('password'))
        {
            $user->password = bcrypt($userRequest->password);
        }

        $user->save();

        $patient->blood_type = $request->blood_type;
        $patient->alergies = $request->alergies;
        $patient->special_note = $request->special_note;
        $patient->birth = $request->birth;
        $patient->save();

        return redirect()->route('patients.index')->withToastInfo('Patients info has been updated');
    }

}
