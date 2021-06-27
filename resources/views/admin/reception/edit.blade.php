@extends('layouts.admin')

@section('content')

    @include('includes.errors')

    <form action="{{ route('reception.update', $appointment) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="appointment_title">Appointment title</label>
            <input type="text" name="appointment_title" value="{{ $appointment->appointment_title }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="appointment_date">Appointment date</label>
            <input type="date" name="appointment_date" value="{{ $appointment->appointment_date }}" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" name="btn_update_appointment_from_reception" class="btn btn-block btn-primary btn-md">Update appointment request</button>
        </div>
    </form>

    @include('includes.errors')

@endsection
