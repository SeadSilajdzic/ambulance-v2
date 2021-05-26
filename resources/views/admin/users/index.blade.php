@extends('layouts.admin')

@section('content')

    @include('includes.sessions')

    <small><b>Users count: {{ $users->count() }}</b></small>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Email</th>
                <th>Created</th>
                <th>View</th>
                <th>Edit</th>
                <th>Trash</th>
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
                        <td>{{ $user->created_at->toFormattedDateString() }}</td>
                        <td><a href="{{ route('users.show', $user->id) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a></td>

                        @if(auth()->user()->id != $user->id)
                            <td><a href="{{ route('users.trash', $user->id) }}" type="button" class="btn btn-sm btn-warning"><i class="fas fa-trash"></i></a></td>
                        @else
                            <td>Your account</td>
                        @endif
                    </tr>
                @endforeach
            @else
                We have found some kind of issue. Please contact support!
            @endif
        </tbody>
    </table>

@endsection
