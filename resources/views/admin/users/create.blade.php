@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                Create User
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="roles" class="form-label">Roles</label>
                        <select name="roles[]" class="form-control @error('roles') is-invalid @enderror" multiple>
                            <option value="" disabled selected>Choose a roles...</option>

                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('roles') == $role->id ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>

                        @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="roles" class="form-label">Roles</label><br>
                            @foreach($roles as $role)
                                <label class="checkbox-inline @error('roles') is-invalid @enderror mt-2">
                                    <input 
                                        type="checkbox" 
                                        name="roles[]" 
                                        value="{{ $role->id }}" 
                                    > 
                                        {{ ucfirst($role->name) }} &nbsp;
                                </label>
                            @endforeach

                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-info btn-sm">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection