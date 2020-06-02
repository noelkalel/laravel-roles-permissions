@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.users.update", $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="roles" class="form-label">Roles</label> <br>

                        {{ $user->roles->count() >= 2 ? 'Current Roles:' : 'Current Role:' }}
                        @foreach($user->roles as $role)
                            <span>
                                {{ ucfirst($role->name) }}@if(!$loop->last),@endif
                            </span>
                        @endforeach <br>

                        @foreach($roles as $role)
                            <label class="checkbox-inline @error('roles') is-invalid @enderror mt-2">
                                @if($role->name == 'admin' && auth()->user()->hasRole('admin'))
                                    <input 
                                        type="checkbox" 
                                        name="roles[]" 
                                        value="{{ $role->id }}" 
                                        {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                                    > 
                                        {{ ucfirst($role->name) }} &nbsp;
                                    
                                @elseif($role->name == 'user')
                                    <input 
                                        type="checkbox" 
                                        name="roles[]" 
                                        value="{{ $role->id }}" 
                                        {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                                    > 
                                        {{ ucfirst($role->name) }} &nbsp;
                                @endif
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