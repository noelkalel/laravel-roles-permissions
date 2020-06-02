@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                Create Permission
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.permissions.store") }}" enctype="multipart/form-data">
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

                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline-info btn-sm">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection