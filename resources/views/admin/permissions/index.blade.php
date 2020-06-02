@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        @include('layouts.success.index')
        <div class="card">
            <div class="card-header">
                Permissions List
                @can('permission_create')
                    <a class="btn btn-success btn-sm pull float-right" href="{{ route('admin.permissions.create') }}">
                        <i class="fa fa-plus"> Add Permission</i>
                    </a>
                @endcan
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        {{ $permission->id }}
                                    </td>
                                    <td>
                                        {{ $permission->name }}
                                    </td>
                                    <td>
                                        @can('permission_show')
                                            <a 
                                                class="btn btn-primary btn-sm" 
                                                href="{{ route('admin.permissions.show', $permission) }}">
                                                <i class="fa fa-eye"> View</i>
                                            </a>
                                        @endcan

                                        @can('permission_edit')
                                            <a 
                                                class="btn btn-info btn-sm" 
                                                href="{{ route('admin.permissions.edit', $permission) }}">
                                                <i class="fa fa-edit"> Edit</i>
                                            </a>
                                        @endcan

                                        @can('permission_delete')
                                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" onsubmit="return confirm('Are you Sure');" style="display: inline-block;">
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
