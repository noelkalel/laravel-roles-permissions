<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('permission_access');

        $permissions = Permission::latest()->get();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $this->authorize('permission_create');

        return view('admin.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        Permission::create([
            'name' => request('name')
        ]);

        return redirect()->route('admin.permissions.index')->withSuccess('Permission has been created');
    }

    public function show(Permission $permission)
    {
        $this->authorize('permission_show');

        return view('admin.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        $this->authorize('permission_edit');

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update([
            'name' => request('name')
        ]);

        return redirect()->route('admin.permissions.index')->withSuccess('Permission has been updated');
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('permission_delete');

        $permission->delete();

        return back()->withSuccess('Permission has been deleted');

    }
}
