<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest\EditUserRequest;
use App\Http\Requests\UsersRequest\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::orderBy('role_id', 'ASC')->orderBy('created_at')->with('role')->withoutTrashed()->paginate(15),
            'allUsers' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'roles' => Role::where('id', '!=', 3)->get(),
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
        if(!empty($request->slug))
        {
            $slug = $request->slug;
        } else {
            $slug = Str::slug($request->name);
        }

        User::create([
           'name' => $request->name,
           'email' => $request->email,
           'username' => $request->username,
           'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'phone' => $request->phone,
            'slug' => $slug,
        ]);

        return redirect()->route('users.index')->withToastSuccess('User has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('appointments');
        return view('admin.users.show', [
            'user' => $user,
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
        if(!empty($request->slug))
        {
            $slug = $request->slug;
        } else {
            $slug = Str::slug($request->name);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->slug = $slug;
        $user->save();

        return redirect()->route('users.index')->withToastInfo('Users info has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user = User::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $user->forceDelete();

        return redirect()->route('users.index')->withToastError('User has been deleted!');
    }

    public function trashedUsers()
    {
        return view('admin.users.trashed', [
            'users' => User::onlyTrashed()->get()
        ]);
    }

    public function trash(User $user)
    {
        $user->delete();

        session()->flash('warning', 'User has been trashed!');
        return redirect()->route('users.index');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        $user->restore();

        if(count(User::onlyTrashed()->get()) > 0)
        {
            return redirect()->route('users.trashed')->withSuccess('User has been restored');
        } else {
            return redirect()->route('users.index')->withSuccess('User has been restored');
        }
    }
}
