@extends('admin.layouts.admin')

@section('title', 'Add Penal Code Section - Admin Dashboard')
@section('page-title', 'Add New Section')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.penal-code.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="chapter_name" class="form-label">Chapter Name *</label>
                        <input type="text" class="form-control @error('chapter_name') is-invalid @enderror"
                               id="chapter_name" name="chapter_name" value="{{ old('chapter_name') }}" required>
                        @error('chapter_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sub_chapter_name" class="form-label">Sub Chapter Name</label>
                        <input type="text" class="form-control @error('sub_chapter_name') is-invalid @enderror"
                               id="sub_chapter_name" name="sub_chapter_name" value="{{ old('sub_chapter_name') }}">
                        @error('sub_chapter_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="section_number" class="form-label">Section Number *</label>
                        <input type="text" class="form-control @error('section_number') is-invalid @enderror"
                               id="section_number" name="section_number" value="{{ old('section_number') }}" required>
                        @error('section_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sub_section_number" class="form-label">Sub Section Number</label>
                        <input type="text" class="form-control @error('sub_section_number') is-invalid @enderror"
                               id="sub_section_number" name="sub_section_number" value="{{ old('sub_section_number') }}">
                        @error('sub_section_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="name_of_the_section" class="form-label">Section Name *</label>
                        <input type="text" class="form-control @error('name_of_the_section') is-invalid @enderror"
                               id="name_of_the_section" name="name_of_the_section" value="{{ old('name_of_the_section') }}" required>
                        @error('name_of_the_section')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="section_content" class="form-label">Section Content *</label>
                        <textarea class="form-control @error('section_content') is-invalid @enderror"
                                  id="section_content" name="section_content" rows="5" required>{{ old('section_content') }}</textarea>
                        @error('section_content')
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
                        <button type="submit" class="btn btn-primary">Save Section</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
