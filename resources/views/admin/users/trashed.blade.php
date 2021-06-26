@extends('layouts.admin')

@section('content')

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
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->deleted_at->toFormattedDateString() }}</td>
                    <td><a href="{{ route('users.show', $user) }}" type="button" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>

                    <td>
                        <form action="{{ route('users.restore', $user->id) }}" method="get">
                            @csrf

                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>
                    </td>

                    <td><a href="{{ route('users.destroy', $user) }}" type="button" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></a></td>

                </tr>
            @endforeach
        @else
            We have found some kind of issue. Please contact support!
        @endif
        </tbody>
    </table>

@endsection
