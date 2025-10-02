@extends('admin.layouts.admin')

@section('title', 'Add New Police Station')
@section('page-title', 'Add New Police Station')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Police Station</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.police.index') }}">Police Directory</a></li>
        <li class="breadcrumb-item active">Add Station</li>
    </ol>

    <div class="row">
        <div class="col-xl-8 col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.police.stations.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="division_id" class="form-label">Police Division</label>
                            <select name="division_id" id="division_id" class="form-select @error('division_id') is-invalid @enderror" required>
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? 'selected' : '' }}>
                                        {{ $division->name }} ({{ $division->province->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('division_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Station Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="oic_mobile" class="form-label">OIC Mobile</label>
                                    <input type="tel" class="form-control @error('oic_mobile') is-invalid @enderror"
                                           id="oic_mobile" name="oic_mobile" value="{{ old('oic_mobile') }}">
                                    @error('oic_mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="office_phone" class="form-label">Office Phone</label>
                                    <input type="tel" class="form-control @error('office_phone') is-invalid @enderror"
                                           id="office_phone" name="office_phone" value="{{ old('office_phone') }}">
                                    @error('office_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror"
                                      id="address" name="address" rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror"
                                           id="latitude" name="latitude" value="{{ old('latitude') }}">
                                    @error('latitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror"
                                           id="longitude" name="longitude" value="{{ old('longitude') }}">
                                    @error('longitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.police.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Station</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add any necessary JavaScript for form validation or enhancements
});
</script>
@endpush
