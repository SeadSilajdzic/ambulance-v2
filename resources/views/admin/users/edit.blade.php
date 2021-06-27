@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h2 class="mb-4">Edit {{ $user->name }}'s info</h2>
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm h-50">Check all users</a>
        </div>
    </div>

    @include('includes.errors')

    <form action="{{ route('users.update', $user) }}" method="post">
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
            <label for="phone">Phone</label>
            <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $user->slug }}" placeholder="Leave blank to stay the same">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" name="btn_edit_user" type="submit">Edit user</button>
        </div>
    </form>

    @include('includes.errors')

@endsection
