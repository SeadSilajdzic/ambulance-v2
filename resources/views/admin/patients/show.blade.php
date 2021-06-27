@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h2 class="mb-4">Details about {{ $patient->name }}</h2>
            <a href="{{ route('patients.index') }}" class="btn btn-primary btn-sm h-50">Check all patients</a>
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
                        <p>{{ $patient->name }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Username</label>
                        <p>{{ $patient->username }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Email</label>
                        <p>{{ $patient->email }}</p>
                    </div>
                    @if($patient->phone)
                        <div class="d-flex justify-content-between">
                            <label>Phone</label>
                            <p>{{ $patient->phone }}</p>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <label>Role</label>
                        <p>{{ $patient->role->name }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>Slug</label>
                        <p>{{ $patient->slug }}</p>
                    </div>
                </div>
            </div>
        </div> <!--Basic info-->

        @if($patient->patient)
            <div class="bg-gradient-info card col-md-6">
                <div class="card-header">
                    <h3>Patient information</h3>
                </div>

                <div class="card-body">
                    <div class="row d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <label>Blood type</label>
                            <p>{{ $patient->patient->blood_type }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label>Birth</label>
                            <p>{{ $patient->patient->birth->toFormattedDateString() }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label>Alergies</label>
                            <p>{{ Str::limit($patient->patient->alergies, 100) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label>Special note</label>
                            <p>{{ Str::limit($patient->patient->special_note, 100) }}</p>
                        </div>
                    </div>
                </div>
            </div> <!--Patient info-->
        @endif

        @if($patient->patient)
            <div class="card col-md-12" style="background: #7d7d7d; color: white">
                <div class="card-header">
                    <h3>Number of appointments: {{ count($patient->appointments)  }}</h3>
                </div>
                <div class="card-body">
                    @if($patient->appointments)
                        <ol>
                            @foreach($patient->appointments as $appointment)
                                <li class="my-2">
                                    <a href="{{ route('appointments.patient.emr', $appointment) }}" style="color: white;">{{ $appointment->appointment_title }}</a>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        There are no appointments for this patient
                    @endif
                </div>
            </div> <!--Appointments info-->
        @endif
    </div>
@endsection
