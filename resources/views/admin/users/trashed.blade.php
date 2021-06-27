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

                    <td>
                        <form action="{{ route('users.restore', $user->id) }}" method="get">
                            @csrf

                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('users.destroy', $user->slug) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" name="btn_perma_delete_user" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
        @else
            We have found some kind of issue. Please contact support!
        @endif
        </tbody>
    </table>

@endsection
