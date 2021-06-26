@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-olive">
                <div class="inner">
                    <h3>{{ count($allAppointments) }}</h3>
                    <p>Appointments</p>
                </div>
                <a href="{{ route('appointments.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-indigo">
                <div class="inner">
                    <h3>{{ count($requestedAppointmentsCount) }}</h3>
                    <p>Appointment Requests</p>
                </div>
                <a href="{{ route('admin.index') }}" class="small-box-footer">Back to dashboard <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    @include('includes.sessions')
    {{ $appointments->links() }}
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Patient</th>
            <th>Age</th>
            <th>Created</th>
            <th>Details</th>
            <th>Fill details</th>
            <th>Approve</th>
        </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                @foreach($appointment->users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ Carbon\Carbon::parse($user->patient->birth)->age > 0 ? Carbon\Carbon::parse($user->patient->birth)->age .' years' : Carbon\Carbon::parse($user->patient->birth)->month .' months' }}</td>
                        <td>{{ $appointment->created_at->toFormattedDateString() }}</td>
                        <td><a href="{{ route('reception.show', $appointment) }}" class="btn btn-sm btn-primary"><span class="fas fa-list"></span></a></td>
                        <td><a href="{{ route('reception.edit', $appointment) }}" class="btn btn-sm btn-success"><span class="fas fa-pen"></span></a></td>
                        @if($appointment->appointment_approved === 0)
                            <td><a href="{{ route('reception.approve', $appointment) }}" class="btn btn-sm btn-secondary"><span class="fas fa-check"></span></a></td>
                        @else
                            <td><a href="{{ route('reception.approve', $appointment) }}" class="btn btn-sm btn-danger"><span class="fas fa-ban"></span></a></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    {{ $appointments->links() }}

@endsection
