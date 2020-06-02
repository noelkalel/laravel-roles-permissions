@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        @include('layouts.success.index')
        <div class="card">
            <div class="card-header">
                Users List

                @can('user_create')
                    <a class="btn btn-success btn-sm pull float-right" href="{{ route('admin.users.create') }}">
                        <i class="fa fa-plus"> Add User</i>
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
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge badge-pill badge-info">
                                                {{ ucfirst($role->name) }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('user_show')
                                            <a class="btn btn-primary btn-sm" 
                                                href="{{ route('admin.users.show', $user) }}">
                                                <i class="fa fa-eye"> View</i>
                                            </a>
                                        @endcan

                                        @can('user_edit', $user) <!-- user can only change its info -->
                                            <a class="btn btn-info btn-sm" 
                                                href="{{ route('admin.users.edit', $user) }}">
                                                <i class="fa fa-edit"> Edit</i>
                                            </a>
                                        @endcan

                                        @can('user_delete', $user) <!-- user can only delete its info -->
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you Sure');" style="display: inline-block;">
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
