@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h2 class="mb-4">Details about {{ $user->name }}</h2>
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm h-50">Check all users</a>
        </div>
    </div>

    <div class="row">
        <div class="bg-gradient-success card col-md-6">
            <div class="card-header">
                <h4>Contact information</h4>
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
                    @if($user->phone)
                        <div class="d-flex justify-content-between">
                            <label>Phone</label>
                            <p>{{ $user->phone }}</p>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <label>Role</label>
                        <p>{{ $user->role->name }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Slug</label>
                        <p>{{ $user->slug }}</p>
                    </div>
                </div>
            </div>
        </div> <!--Basic info-->

        @if($user->patient)
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
        @endif

        @if($user->patient)
            <div class="card col-md-12" style="background: #7d7d7d; color: white">
                <div class="card-header">
                    <h3>Number of appointments: {{ count($user->appointments)  }}</h3>
                </div>
                <div class="card-body">
                    @if($user->appointments)
                        <ol>
                            @foreach($user->appointments as $appointment)
                                    <li class="my-2">
                                        <a href="{{ route('appointments.patient.emr', $appointment) }}" style="color: white;">{{ $appointment->appointment_title }}</a>
                                    </li>
                            @endforeach
                        </ol>
                    @else
                        There are no appointments for this user
                    @endif
                </div>
            </div> <!--Appointments info-->
        @endif
    </div>
@endsection
