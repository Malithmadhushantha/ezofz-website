@extends('admin.layouts.admin')

@section('title', 'Edit User - EZofz.lk')
@section('page-title', 'Edit User')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role *</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form action="{{ route('admin.users.password', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password *</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password *</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
