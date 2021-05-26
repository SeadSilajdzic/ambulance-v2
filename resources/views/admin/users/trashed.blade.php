@extends('layouts.admin')

@section('content')

    @include('includes.sessions')

    <small><b>Trashed users count: {{ $users->count() }}</b></small>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Email</th>
            <th>Trashed</th>
            <th>View</th>
            <th>Restore</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>Role</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->deleted_at->toFormattedDateString() }}</td>
                    <td><a href="{{ route('users.show', $user->id) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>
                    <td><a href="{{ route('users.restore', $user->id) }}" class="btn btn-sm btn-success"><i class="fas fa-recycle"></i></a></td>
                    <td><a href="{{ route('users.trash', $user->id) }}" type="button" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></a></td>
                </tr>
            @endforeach
        @else
            We have found some kind of issue. Please contact support!
        @endif
        </tbody>
    </table>

@endsection
