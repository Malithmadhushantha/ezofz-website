@extends('admin.layouts.admin')

@section('title', 'Manage Users - EZofz.lk')
@section('page-title', 'User Management')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="mb-0">All Users</h4>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="bi bi-plus"></i> Add User
    </a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'secondary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this user?')" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $users->links() }}

<div class="card mt-5">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Recently Logged In Users</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @forelse($recentLogins as $user)
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-person-circle fs-2 text-primary mb-2"></i>
                            <h6 class="mb-1">{{ $user->name }}</h6>
                            <p class="mb-0 text-muted small">{{ $user->email }}</p>
                            <p class="mb-0 text-muted small">Last login: {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No recent logins.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
