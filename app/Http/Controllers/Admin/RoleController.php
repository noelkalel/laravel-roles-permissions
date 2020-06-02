<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('role_access');

        $roles = Role::latest()->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create(Role $role)
    {
        $this->authorize('role_create');

        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions', 'role'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create([
            'name' => request('name')
        ]);

        $role->permissions()->sync(request('permissions'));

        return redirect()->route('admin.roles.index')->withSuccess('Role has been created');
    }

    public function show(Role $role)
    {        
        $this->authorize('role_show');

        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $this->authorize('role_edit');

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    { 
        $role->update([
            'name' => request('name'),
        ]);

        $role->permissions()->sync(request('permissions'));

        return redirect()->route('admin.roles.index')->withSuccess('Role has been updated');
    }

    public function destroy(Role $role)
    {
        $this->authorize('role_delete');

        $role->permissions()->detach(); // detach record from pivot table

        $role->delete();

        return back()->withSuccess('Role has been deleted');
    }
}
