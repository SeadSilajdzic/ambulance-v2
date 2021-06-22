@extends('layouts.admin')

@section('content')

    @include('includes.sessions')

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Patient</th>
            <th>Created</th>
            <th>Fill details</th>
            <th>Approve</th>
        </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                @foreach($appointment->users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $appointment->created_at->toFormattedDateString() }}</td>
                        <td><a href="{{ route('reception.edit', $appointment) }}" class="btn btn-sm btn-success"><span class="fas fa-pen"></span></a></td>
                        @if($appointment->appointment_approved === 0)
                            <td><a href="{{ route('reception.approve', $appointment) }}" class="btn btn-sm btn-success"><span class="fas fa-check"></span></a></td>
                        @else
                            <td><a href="{{ route('reception.approve', $appointment) }}" class="btn btn-sm btn-danger"><span class="fas fa-ban"></span></a></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

@endsection
