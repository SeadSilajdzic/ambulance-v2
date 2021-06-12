@extends('layouts.admin')

@section('content')

    EMR For {{ $user->name }} <br>
    Number of patients appointments {{ count($user->appointments) }}

    @foreach($user->appointments as $appointment)
        <h2>
            {{ $appointment->appointment_title }}
        </h2>
    @endforeach

@endsection
