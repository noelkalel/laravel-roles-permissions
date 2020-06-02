@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                Create Role
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
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

                    {{-- <div class="form-group">
                        <label for="permissions" class="form-label">Permissions</label>
                        <select name="permissions[]" class="form-control @error('permissions') is-invalid @enderror" multiple>
                            <option value="" disabled selected>Choose a permissions...</option>

                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}" {{ old('permissions') == $permission->id ? 'selected' : '' }}>
                                    {{ ucfirst($permission->name) }}
                                </option>
                            @endforeach
                        </select>

                        @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="permissions" class="form-label">Permissions</label> <br>

                        @foreach($permissions as $permission)
                            <label class="checkbox-inline @error('permissions') is-invalid @enderror mt-2">
                                <input 
                                    type="checkbox" 
                                    name="permissions[]" 
                                    value="{{ $permission->id }}" 
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}
                                > 
                                    {{ ucfirst($permission->name) }} &nbsp;
                            </label>
                        @endforeach

                        @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-info btn-sm">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection