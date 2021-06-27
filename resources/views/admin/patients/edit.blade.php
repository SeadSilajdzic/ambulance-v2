@extends('layouts.admin')

@section('content')

    <h2>Edit {{ $patient->name }}'s info</h2>

    @include('includes.errors')

    <form action="{{ route('patients.update', $patient->patient) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $patient->name }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $patient->slug }}" placeholder="Leave empty to auto generate">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $patient->username }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $patient->email }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" class="form-control" value="{{ $patient->phone }}">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="blood_type">Name</label>
            <input type="text" name="blood_type" class="form-control" value="{{ $patient->patient->blood_type }}">
        </div>

        <div class="form-group">
            <label for="alergies">Alergies</label>
            <input type="text" name="alergies" class="form-control" value="{{ $patient->patient->alergies }}">
        </div>

        <div class="form-group">
            <label for="birth">Birth</label>
            <input type="date" name="birth" class="form-control" value="{{ Carbon\Carbon::parse($patient->patient->birth)->toDateString() }}">
        </div>

        <div class="form-group">
            <label for="special_note">Special note</label>
            <textarea name="special_note" id="special_note" cols="30" rows="10" class="form-control">{{ $patient->patient->special_note }}</textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" name="btn_edit_patient" type="submit">Edit patient</button>
        </div>
    </form>

    @include('includes.errors')

@endsection
