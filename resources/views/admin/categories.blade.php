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
        <div class="card mt-4">
            <div class="card-header">Add New Subcategory</div>
            <div class="card-body">
                <form action="{{ route('admin.subcategories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="parent_category_id" class="form-label">Parent Category *</label>
                        <select class="form-select @error('parent_category_id') is-invalid @enderror"
                                id="parent_category_id" name="parent_category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subcategory_name" class="form-label">Subcategory Name *</label>
                        <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror"
                               id="subcategory_name" name="subcategory_name" required>
                        @error('subcategory_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Subcategory</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Existing Categories & Subcategories</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <strong>{{ $category->name }}</strong>
                            @if($category->subcategories && $category->subcategories->count())
                                <ul class="list-group mt-2 ms-3">
                                    @foreach($category->subcategories as $sub)
                                        <li class="list-group-item py-1">{{ $sub->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
