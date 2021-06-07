<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientsRequest\StorePatientRequest;
use App\Models\AppointmentStatus;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
            'patients' => Patient::with('user')->paginate(15),
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role_id' => 3,
        ]);

        Patient::create([
            'user_id' => $user->id,
            'blood_type' => $request->blood_type,
            'birth' => $request->birth,
            'alergies' => $request->alergies,
            'special_note' => $request->special_note
        ]);


        session()->flash('success', 'Patient has been created successfully!');
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $patient->load('user');
//        dd($patient->user->name);
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
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->save();

        session()->flash('success', 'Users info has been updated!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->forceDelete();

        session()->flash('deleted', 'User has been deleted!');
        return redirect()->route('users.index');
    }

    public function trashedUsers()
    {
        return view('admin.users.trashed', [
            'users' => User::onlyTrashed()->get()
        ]);
    }

    public function trash(User $user)
    {
        $user->delete();

        session()->flash('warning', 'User has been trashed!');
        return redirect()->route('users.index');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        $user->restore();

        session()->flash('success', 'User has been restored!');

        if(count(User::onlyTrashed()->get()) > 0)
        {
            return redirect()->route('users.trashed');
        } else {
            return redirect()->route('users.index');
        }
    }
}
