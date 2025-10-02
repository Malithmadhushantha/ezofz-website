@extends('admin.layouts.admin')

@section('title', 'Edit Penal Code Section - Admin Dashboard')
@section('page-title', 'Edit Section')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editing Section {{ $section->section_number }}</h5>
            <a href="{{ route('admin.penal-code.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Back to List
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.penal-code.update', $section) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="chapter_name" class="form-label">Chapter Name *</label>
                        <input type="text" class="form-control @error('chapter_name') is-invalid @enderror"
                               id="chapter_name" name="chapter_name" value="{{ old('chapter_name', $section->chapter_name) }}" required>
                        @error('chapter_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sub_chapter_name" class="form-label">Sub Chapter Name</label>
                        <input type="text" class="form-control @error('sub_chapter_name') is-invalid @enderror"
                               id="sub_chapter_name" name="sub_chapter_name" value="{{ old('sub_chapter_name', $section->sub_chapter_name) }}">
                        @error('sub_chapter_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="section_number" class="form-label">Section Number *</label>
                        <input type="text" class="form-control @error('section_number') is-invalid @enderror"
                               id="section_number" name="section_number" value="{{ old('section_number', $section->section_number) }}" required>
                        @error('section_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sub_section_number" class="form-label">Sub Section Number</label>
                        <input type="text" class="form-control @error('sub_section_number') is-invalid @enderror"
                               id="sub_section_number" name="sub_section_number" value="{{ old('sub_section_number', $section->sub_section_number) }}">
                        @error('sub_section_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="name_of_the_section" class="form-label">Section Name *</label>
                        <input type="text" class="form-control @error('name_of_the_section') is-invalid @enderror"
                               id="name_of_the_section" name="name_of_the_section" value="{{ old('name_of_the_section', $section->name_of_the_section) }}" required>
                        @error('name_of_the_section')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="section_content" class="form-label">Section Content *</label>
                        <textarea class="form-control @error('section_content') is-invalid @enderror"
                                  id="section_content" name="section_content" rows="5" required>{{ old('section_content', $section->section_content) }}</textarea>
                        @error('section_content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Illustrations</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="illustrations_1" class="form-label">Illustration 1</label>
                                        <textarea class="form-control @error('illustrations_1') is-invalid @enderror"
                                                id="illustrations_1" name="illustrations_1" rows="3">{{ old('illustrations_1', $section->illustrations_1) }}</textarea>
                                        @error('illustrations_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="illustrations_2" class="form-label">Illustration 2</label>
                                        <textarea class="form-control @error('illustrations_2') is-invalid @enderror"
                                                id="illustrations_2" name="illustrations_2" rows="3">{{ old('illustrations_2', $section->illustrations_2) }}</textarea>
                                        @error('illustrations_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="illustrations_3" class="form-label">Illustration 3</label>
                                        <textarea class="form-control @error('illustrations_3') is-invalid @enderror"
                                                id="illustrations_3" name="illustrations_3" rows="3">{{ old('illustrations_3', $section->illustrations_3) }}</textarea>
                                        @error('illustrations_3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Explanations</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="explanation_1" class="form-label">Explanation 1</label>
                                        <textarea class="form-control @error('explanation_1') is-invalid @enderror"
                                                id="explanation_1" name="explanation_1" rows="3">{{ old('explanation_1', $section->explanation_1) }}</textarea>
                                        @error('explanation_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="explanation_2" class="form-label">Explanation 2</label>
                                        <textarea class="form-control @error('explanation_2') is-invalid @enderror"
                                                id="explanation_2" name="explanation_2" rows="3">{{ old('explanation_2', $section->explanation_2) }}</textarea>
                                        @error('explanation_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="explanation_3" class="form-label">Explanation 3</label>
                                        <textarea class="form-control @error('explanation_3') is-invalid @enderror"
                                                id="explanation_3" name="explanation_3" rows="3">{{ old('explanation_3', $section->explanation_3) }}</textarea>
                                        @error('explanation_3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.penal-code.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Section</button>
                    </div>
                </div>
            </div>
        </form>

        @if($section->amendments->count() > 0)
        <div class="mt-4">
            <h5>Amendments History</h5>
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Amendment No.</th>
                            <th>Date</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($section->amendments()->orderBy('amendment_date', 'desc')->get() as $amendment)
                        <tr>
                            <td>{{ $amendment->amendment_number }}</td>
                            <td>{{ $amendment->amendment_date->format('Y-m-d') }}</td>
                            <td>{{ Str::limit($amendment->amendment_content, 100) }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#amendmentModal{{ $amendment->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Amendment Details Modal -->
                        <div class="modal fade" id="amendmentModal{{ $amendment->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Amendment Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <h6>Amendment Number</h6>
                                            <p>{{ $amendment->amendment_number }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h6>Amendment Date</h6>
                                            <p>{{ $amendment->amendment_date->format('F d, Y') }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h6>Content</h6>
                                            <p>{{ $amendment->amendment_content }}</p>
                                        </div>

                                        @if($amendment->illustrations_1 || $amendment->illustrations_2 || $amendment->illustrations_3)
                                            <div class="mb-3">
                                                <h6>Illustrations</h6>
                                                @if($amendment->illustrations_1)
                                                    <p><strong>1.</strong> {{ $amendment->illustrations_1 }}</p>
                                                @endif
                                                @if($amendment->illustrations_2)
                                                    <p><strong>2.</strong> {{ $amendment->illustrations_2 }}</p>
                                                @endif
                                                @if($amendment->illustrations_3)
                                                    <p><strong>3.</strong> {{ $amendment->illustrations_3 }}</p>
                                                @endif
                                            </div>
                                        @endif

                                        @if($amendment->explanation_1 || $amendment->explanation_2 || $amendment->explanation_3)
                                            <div class="mb-3">
                                                <h6>Explanations</h6>
                                                @if($amendment->explanation_1)
                                                    <p><strong>1.</strong> {{ $amendment->explanation_1 }}</p>
                                                @endif
                                                @if($amendment->explanation_2)
                                                    <p><strong>2.</strong> {{ $amendment->explanation_2 }}</p>
                                                @endif
                                                @if($amendment->explanation_3)
                                                    <p><strong>3.</strong> {{ $amendment->explanation_3 }}</p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Add confirmation before form submission
    document.querySelector('form').addEventListener('submit', function(e) {
        if (!confirm('Are you sure you want to update this section?')) {
            e.preventDefault();
        }
    });
</script>
@endpush
@endsection
