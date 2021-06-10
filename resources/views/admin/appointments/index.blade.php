@extends('layouts.admin')

@section('content')

    @include('includes.sessions')

    <small><b>Appointments count: {{ $appointments->count() }}</b></small>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Patient</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        @if($appointments)
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->appointment_title }}</td>
                    @foreach($appointment->users as $user)
                        <td>{{ $user->name }}</td>
                    @endforeach
                    <td>{{ $appointment->created_at->toFormattedDateString() }}</td>
{{--                    <td><a href="{{ route('appointments.show', $appointment) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>--}}
{{--                    <td><a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a></td>--}}
{{--                    <td><a href="{{ route('appointments.index', $appointment) }}" type="button" class="btn btn-sm btn-warning"><i class="fas fa-trash"></i></a></td>--}}
                </tr>
            @endforeach
        @else
            We have found some kind of issue. Please contact support!
        @endif
        </tbody>
    </table>

@endsection
