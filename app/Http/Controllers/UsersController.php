<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest\EditUserRequest;
use App\Http\Requests\UsersRequests\StoreUserRequest;
use App\Models\Role;
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
        $this->authorize('viewAny', User::class);

        return view('admin.users.index', [
            'users' => User::with('role')->withoutTrashed()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('admin.users.create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);

        User::create([
           'name' => $request->name,
           'email' => $request->email,
           'username' => $request->username,
           'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
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
        $this->authorize('viewAny', $user);

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
        $this->authorize('edit', $user);

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
        $this->authorize('update', $user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
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
        $this->authorize('forceDelete', $user);

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

    public function trash(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        session()->flash('warning', 'User has been trashed!');
        return redirect()->route('users.index');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        $user->restore();

        session()->flash('success', 'User has been restored!');

        if(count(User::onlyTrashed()->get()) > 0)
        {
            return redirect()->route('users.trashed');
        } else {
            return redirect()->route('users.index');
        }
    }
}
