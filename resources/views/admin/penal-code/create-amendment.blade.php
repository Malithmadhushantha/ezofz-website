@extends('admin.layouts.admin')

@section('title', 'Add Amendment - Admin Dashboard')
@section('page-title', 'Add Amendment')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Add Amendment for Section {{ $section->section_number }}</h5>
        <p class="text-muted mb-0">{{ $section->name_of_the_section }}</p>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.penal-code.amendments.store', $section) }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="amendment_number" class="form-label">Amendment Number *</label>
                        <input type="text" class="form-control @error('amendment_number') is-invalid @enderror"
                               id="amendment_number" name="amendment_number" value="{{ old('amendment_number') }}" required>
                        @error('amendment_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="amendment_date" class="form-label">Amendment Date *</label>
                        <input type="date" class="form-control @error('amendment_date') is-invalid @enderror"
                               id="amendment_date" name="amendment_date" value="{{ old('amendment_date') }}" required>
                        @error('amendment_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="amendment_content" class="form-label">Amendment Content *</label>
                        <textarea class="form-control @error('amendment_content') is-invalid @enderror"
                                  id="amendment_content" name="amendment_content" rows="5" required>{{ old('amendment_content') }}</textarea>
                        @error('amendment_content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <h5 class="mb-3">Illustrations</h5>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="illustrations_1" class="form-label">Illustration 1</label>
                        <textarea class="form-control @error('illustrations_1') is-invalid @enderror"
                                  id="illustrations_1" name="illustrations_1" rows="3">{{ old('illustrations_1') }}</textarea>
                        @error('illustrations_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="illustrations_2" class="form-label">Illustration 2</label>
                        <textarea class="form-control @error('illustrations_2') is-invalid @enderror"
                                  id="illustrations_2" name="illustrations_2" rows="3">{{ old('illustrations_2') }}</textarea>
                        @error('illustrations_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="illustrations_3" class="form-label">Illustration 3</label>
                        <textarea class="form-control @error('illustrations_3') is-invalid @enderror"
                                  id="illustrations_3" name="illustrations_3" rows="3">{{ old('illustrations_3') }}</textarea>
                        @error('illustrations_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <h5 class="mb-3">Explanations</h5>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="explanation_1" class="form-label">Explanation 1</label>
                        <textarea class="form-control @error('explanation_1') is-invalid @enderror"
                                  id="explanation_1" name="explanation_1" rows="3">{{ old('explanation_1') }}</textarea>
                        @error('explanation_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="explanation_2" class="form-label">Explanation 2</label>
                        <textarea class="form-control @error('explanation_2') is-invalid @enderror"
                                  id="explanation_2" name="explanation_2" rows="3">{{ old('explanation_2') }}</textarea>
                        @error('explanation_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="explanation_3" class="form-label">Explanation 3</label>
                        <textarea class="form-control @error('explanation_3') is-invalid @enderror"
                                  id="explanation_3" name="explanation_3" rows="3">{{ old('explanation_3') }}</textarea>
                        @error('explanation_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.penal-code.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Amendment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
