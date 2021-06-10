@extends('layouts.admin')

@section('content')

    @include('includes.sessions')

    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{ Sead }}</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created</th>
            <th title="Electronic Medical Record">EMR</th>
            <th>View</th>
            <th>Edit</th>
            <th>Trash</th>
        </tr>
        </thead>
        <tbody>
        @if($patients)
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->user->name }}</td>
                    <td>{{ $patient->user->username }}</td>
                    <td>{{ $patient->user->email }}</td>
                    <td>{{ $patient->user->created_at->toFormattedDateString() }}</td>
                    <td><a href="{{ route('patients.emr', $patient) }}" type="button" class="btn btn-sm btn-primary"><i class="fas fa-history"></i></a></td>
                    <td><a href="{{ route('patients.show', $patient) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>
                    <td><a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{ route('patients.index', $patient) }}" type="button" class="btn btn-sm btn-warning"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
        @else
            We have found some kind of issue. Please contact support!
        @endif
        </tbody>
    </table>

@endsection
