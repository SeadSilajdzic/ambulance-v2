@extends('layouts.admin')

@section('content')

    <div class="mx-2">
        <h2>Add new user</h2>

        @include('includes.errors')

        <form action="{{ route('appointments.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="appointment_title">Title</label>
                <input type="text" name="appointment_title" class="form-control" value="{{ old('appointment_title') }}">
            </div>

            <div class="form-group">
                <label for="diagnosis">Diagnosis</label>
                <textarea name="diagnosis" id="diagnosis" cols="30" rows="10" class="form-control">{{old('diagnosis')}}</textarea>
            </div>

            <div class="form-group">
                <label for="appointment_special_note">Special note</label>
                <textarea name="appointment_special_note" id="appointment_special_note" cols="30" rows="10" class="form-control">{{old('appointment_special_note')}}</textarea>
            </div>

            <div class="form-group">
                <label for="appointment_date">Appointment date</label>
                <input type="date" name="appointment_date" class="form-control" min="{{$minDate}}" value="{{ old('appointment_date') }}">
                <small class="text-muted">You can't create appointment for today!</small>
            </div>

            <div class="form-group">
                <label for="patient_id">Assign to patient</label>
                @if($patients)
                    <select name="patient_id" id="patient_id" class="form-control">
                        <option selected disabled>Select patient</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->user->id }}">{{ $patient->user->name }}</option>
                        @endforeach
                    </select>
                @else
                    Currently, we don't have any patients!
                @endif
            </div>

            <div class="form-group">
                <button type="submit" name="btn_create_appointment" class="btn btn-primary">Add new appointment</button>
            </div>
        </form>
    </div>

    @include('includes.errors')

@endsection
