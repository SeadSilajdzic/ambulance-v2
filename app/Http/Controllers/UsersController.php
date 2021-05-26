<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest\EditUserRequest;
use App\Http\Requests\UsersRequests\StoreUserRequest;
use App\Models\User;
use Cassandra\Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('admin.users.index', [
            'users' => User::withoutTrashed()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
           'name' => $request->name,
           'email' => $request->email,
           'username' => $request->username,
           'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'User has been created successfully!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();

        session()->flash('success', 'Users info has been updated!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->forceDelete();

        session()->flash('deleted', 'User has been deleted!');
        return redirect()->route('users.index');
    }

    public function trashedUsers()
    {
        return view('admin.users.trashed', [
            'users' => User::onlyTrashed()->get()
        ]);
    }

    public function trash($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        session()->flash('warning', 'User has been trashed!');
        return redirect()->route('users.index');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();

        session()->flash('success', 'User has been restored!');
        return redirect()->route('users.index');
    }
}
