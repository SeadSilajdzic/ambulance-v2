@extends('layouts.admin')

@section('content')

    <div class="mx-2">
        <h2>Add new patient</h2>

        <form action="{{ route('patients.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
            </div>

            <div class="form-group">
                <label for="blood_type">Blood type</label>
                <input type="text" name="blood_type" class="form-control" value="{{ old('blood_type') }}">
            </div>

            <div class="form-group">
                <label for="birth">Birth</label>
                <input type="date" max="{{ $maxDate }}" name="birth" class="form-control" value="{{ old('birth') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="alergies">Alergies</label>
                <input type="text" name="alergies" class="form-control" value="{{ old('alergies') }}">
            </div>

            <div class="form-group">
                <label for="special_note">Special note</label>
                <textarea name="special_note" id="special_note" cols="30" rows="10" class="form-control">{{ old('special_note') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="btn_create_patient" class="btn btn-primary">Add new patient</button>
            </div>
        </form>
    </div>

@endsection
