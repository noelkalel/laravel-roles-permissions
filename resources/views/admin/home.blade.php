@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Welcome, {{ ucfirst(auth()->user()->name) }} <hr>

                        - Your access group is: <br>
                        @foreach(auth()->user()->roles as $role)
                            <i>{{ ucfirst($role->name) }}</i>
                        @endforeach <br><br>

                        - Your permissions are: <br>
                        
                        @foreach($role->permissions as $permission)
                            <span>
                                <i>{{ ucfirst($permission->name) }}</i> <br>
                            </span>
                        @endforeach

                        {{-- @foreach(auth()->user()->permissions as $permission)
                            <span>
                                <i>{{ ucfirst($permission->name) }}</i> <br>
                            </span>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection