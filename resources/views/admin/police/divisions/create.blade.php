@extends('admin.layouts.admin')

@section('title', 'Add New Police Division')
@section('page-title', 'Add New Police Division')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Police Division</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.police.index') }}">Police Directory</a></li>
        <li class="breadcrumb-item active">Add Division</li>
    </ol>

    <div class="row">
        <div class="col-xl-8 col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.police.divisions.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="province_id" class="form-label">Province</label>
                            <select name="province_id" id="province_id" class="form-select @error('province_id') is-invalid @enderror" required>
                                <option value="">Select Province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('province_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Division Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.police.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Division</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
