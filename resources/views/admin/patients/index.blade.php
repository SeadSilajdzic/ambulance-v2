@extends('layouts.admin')

@section('content')

    <small><b>Patients count: {{ $patients->count() }}</b></small>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created</th>
            <th title="Electronic Medical Record">EMR</th>
            <th>View</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @if($patients)
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->username }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->created_at->toFormattedDateString() }}</td>
                    <td><a href="{{ route('appointments.emr', $patient) }}" type="button" class="btn btn-sm btn-primary"><i class="fas fa-history"></i></a></td>
                    <td><a href="{{ route('patients.show', $patient) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>
                    <td><a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a></td>
                </tr>
            @endforeach
        @else
            We have found some kind of issue. Please contact support!
        @endif
        </tbody>
    </table>

@endsection
