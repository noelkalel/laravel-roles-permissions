@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                Show Permission
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
                                    {{ $permission->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <td>
                                    {{ $permission->name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline-info btn-sm">Back</a>
                </div>                
            </div>
        </div>
    </div>
@endsection
