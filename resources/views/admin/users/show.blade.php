@extends('layouts.admin')

@section('content')

    <h2 class="py-2 mb-4">Details about {{ $user->name }}</h2>

    <div class="row">
        <div class="bg-gradient-success card col-md-6">
            <div class="card-header">
                <h3>Basic information</h3>
            </div>
            <div class="card-body">
                <div class="row d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <label>Name</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Username</label>
                        <p>{{ $user->username }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Email</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Role</label>
                        <p>{{ $user->role->name }}</p>
                    </div>
                </div>
            </div>
        </div> <!--Basic info-->

        <div class="bg-gradient-info card col-md-6">
            <div class="card-header">
                <h3>Patient information</h3>
            </div>
            <div class="card-body">
                <div class="row d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <label>Blood type</label>
                        <p>{{ $user->patient->blood_type }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Birth</label>
                        <p>{{ $user->patient->birth->toFormattedDateString() }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Alergies</label>
                        <p>{{ Str::limit($user->patient->alergies, 100) }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Special note</label>
                        <p>{{ Str::limit($user->patient->special_note, 100) }}</p>
                    </div>
                </div>
            </div>
        </div> <!--Patient info-->

        <div class="bg-gradient-red card col-md-12">
            <div class="card-header">
                <h3>Number of appointments: {{ count($user->appointments)  }}</h3>
            </div>
            <div class="card-body">
                In progress!
            </div>
        </div> <!--Appointments info-->

    </div>
@endsection
