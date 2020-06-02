<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{ 
    public function index(User $user)
    { 
        $this->authorize('user_access');

        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));    
    }

    public function create(User $user)
    {
        $this->authorize('user_create');

        $roles = Role::all();

        return view('admin.users.create', compact('roles'));    
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        $user->roles()->sync(request('roles'));

        return redirect()->route('admin.users.index')->withSuccess('User has been created');
    }

    public function show(User $user)
    {
        $this->authorize('user_show');

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('user_edit', $user);

        $roles = Role::all();

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    { 
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        
        $user->roles()->sync(request('roles'));

        return redirect()->route('admin.users.index')->withSuccess('User has been updated');
    }

    public function destroy(User $user)
    {
        $this->authorize('user_delete', $user);

        $user->roles()->detach(); // detach record from pivot table

        $user->delete();

        return back()->withSuccess('User has been deleted');
    }
}
