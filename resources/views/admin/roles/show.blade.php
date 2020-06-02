@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                Show Roles
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <td>
                                    {{ $role->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <td>
                                    {{ $role->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Permissions
                                </th>
                                <td>
                                    @foreach($role->permissions as $permissions)
                                        <span class="badge badge-pill badge-info">{{ $permissions->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-info btn-sm">Back</a>
                </div>                
            </div>
        </div>
    </div>
@endsection
