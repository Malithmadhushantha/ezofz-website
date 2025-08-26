@extends('admin.layouts.admin')

@section('title', 'Manage Categories - EZofz.lk')
@section('page-title', 'Manage Document Categories')

@section('content')
<div class="row mb-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Add New Category</div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Existing Categories</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
