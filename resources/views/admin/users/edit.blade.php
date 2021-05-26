@extends('layouts.admin')

@section('content')

    <h2>Edit {{ $user->name }}'s info</h2>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" name="btn_edit_user" type="submit">Edit user</button>
        </div>
    </form>

@endsection
