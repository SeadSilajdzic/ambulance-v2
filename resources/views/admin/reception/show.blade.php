@extends('layouts.admin')

@section('content')
    @foreach($appointment->users as $user)
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-baseline">
                <h2 class="mb-4">Requested appointment by {{ $user->name }}</h2>
                <a href="{{ route('reception.index') }}" class="btn btn-primary btn-sm h-50">Go back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-6 px-4 bg-gradient-green border-right">
                <h4>Appointment details</h4>
                <hr>
                <div class="row d-flex justify-content-between">
                    <p>Appointment title:</p>
                    <p>{{ $appointment->appointment_title ? $appointment->appointment_title : 'Unknown' }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Appointment date:</p>
                    <p>{{ $appointment->appointment_date ? $appointment->appointment_date->toFormattedDateString() : 'Unknown' }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Appointment status:</p>
                    <p>{{ $appointment->appointmentStatus->name }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <div class="col-12 d-flex bg-gradient-dark" style="margin: 0; padding: 0;">
                        <p class="col-4">Appointment request text:</p>
                        <p class="col-8">{{ $appointment->appointment_special_note }}</p>
                    </div>
                </div>

                <h4 class="mt-4">Patient details</h4>
                <hr>
                <div class="row d-flex justify-content-between">
                    <p>Patient name:</p>
                    <p>{{ $user->name }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Birth:</p>
                    <p>{{ $user->patient->birth->toFormattedDateString() }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Age:</p>
                    <p>{{ Carbon\Carbon::parse($user->patient->birth) ? Carbon\Carbon::parse($user->patient->birth)->age .' years old' : Carbon\Carbon::parse($user->patient->birth)->month .' months old' }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Blood type:</p>
                    <p>{{ $user->patient->blood_type ? $user->patient->blood_type : 'Unknown' }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Alergies:</p>
                    <p>{{ $user->patient->alergies ? $user->patient->alergies : 'Unknown' }}</p>
                </div>

                @if($user->patient->special_note)
                    <div class="row d-flex justify-content-between">
                        <div class="col-12 d-flex justify-content-between bg-gradient-warning">
                            <p class="col-4">Users important note:</p>
                            <p class="col-8">{{ $user->patient->special_note }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-6 px-4 bg-gradient-olive">
                <h4 class="mt-4">Contact details</h4>
                <hr>
                <div class="row d-flex justify-content-between">
                    <p>Name:</p>
                    <p>{{ $user->name }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Username:</p>
                    <p>{{ $user->username }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Email:</p>
                    <p>{{ $user->email }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Phone:</p>
                    <p>{{ $user->phone }}</p>
                </div>

                <div class="row d-flex justify-content-between">
                    <p>Username:</p>
                    <p>{{ $user->username }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
