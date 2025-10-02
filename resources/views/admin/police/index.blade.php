@extends('admin.layouts.admin')

@section('title', 'Police Directory Management')
@section('page-title', 'Police Directory Management')

@push('styles')
<style>
    .province-card {
        background: var(--card-bg-primary);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid var(--border-subtle);
    }

    [data-theme="dark"] .province-card {
        background: rgba(15, 25, 40, 0.9);
        border: 1px solid rgba(102, 126, 234, 0.2);
    }

    .division-list {
        margin-top: 1rem;
        border-top: 1px solid var(--border-subtle);
        padding-top: 1rem;
    }

    .station-list {
        margin-left: 1.5rem;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .collapsible-toggle {
        cursor: pointer;
        user-select: none;
    }

    .collapsible-toggle i {
        transition: transform 0.3s ease;
    }

    .collapsible-toggle.collapsed i {
        transform: rotate(-90deg);
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Police Directory Management</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Police Directory</li>
    </ol>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.police.divisions.create') }}" class="btn btn-primary me-2">
                            <i class="bi bi-plus-circle me-1"></i> Add New Division
                        </a>
                        <a href="{{ route('admin.police.stations.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i> Add New Police Station
                        </a>
                    </div>

                    @foreach($provinces as $province)
                    <div class="province-card">
                        <h3 class="d-flex justify-content-between align-items-center mb-3">
                            <span>{{ $province->name }}</span>
                            <small class="text-muted">
                                {{ $province->divisions_count }} Divisions •
                                {{ $province->stations_count }} Stations
                            </small>
                        </h3>

                        @foreach($province->divisions as $division)
                        <div class="division-list">
                            <div class="collapsible-toggle" data-bs-toggle="collapse"
                                 data-bs-target="#division{{ $division->id }}"
                                 aria-expanded="false">
                                <i class="bi bi-chevron-right me-2"></i>
                                <strong>{{ $division->name }}</strong>
                                <span class="text-muted">({{ $division->stations->count() }} stations)</span>
                            </div>

                            <div class="collapse" id="division{{ $division->id }}">
                                <div class="station-list mt-3">
                                    @foreach($division->stations as $station)
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            <i class="bi bi-building me-2"></i>
                                            {{ $station->name }}
                                        </div>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.police.stations.edit', $station) }}"
                                               class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.police.stations.destroy', $station) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this station?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
