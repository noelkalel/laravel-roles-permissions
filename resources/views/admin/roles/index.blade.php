@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        @include('layouts.success.index')
        <div class="card">
            <div class="card-header">
                Roles List
                @can('role_create')
                    <a class="btn btn-success btn-sm pull float-right" href="{{ route('admin.roles.create') }}">
                        <i class="fa fa-plus"> Add Role</i>
                    </a>
                @endcan
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Permission
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                    <td>
                                        {{ $role->name }}
                                    </td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <span class="badge badge-pill badge-info">
                                                {{ ucfirst($permission->name) }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="text-nowrap">
                                        @can('role_show')
                                            <a 
                                                class="btn btn-primary btn-sm" 
                                                href="{{ route('admin.roles.show', $role) }}">
                                                <i class="fa fa-eye"> View</i>
                                            </a>
                                        @endcan

                                        @can('role_edit')
                                            <a 
                                                class="btn btn-info btn-sm" 
                                                href="{{ route('admin.roles.edit', $role) }}">
                                                <i class="fa fa-edit"> Edit</i>
                                            </a>
                                        @endcan

                                        @can('role_delete')
                                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Are you Sure');" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"> Delete</i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
