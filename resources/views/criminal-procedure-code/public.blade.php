@extends('layouts.app')

@section('title', 'Sri Lanka Criminal Procedure Code Database - Free Online Access to Legal Information')
@section('meta_description', 'Access Sri Lanka\'s comprehensive Criminal Procedure Code database. Search and explore legal sections, chapters, and amendments. Free legal resource for lawyers, students, and the public.')
@section('meta_keywords', 'Sri Lanka Criminal Procedure Code, legal database, law sections, criminal law, legal reference, Sri Lankan law')

@section('content')
<!-- Google Ads -->
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="ad-space text-center">
                <!-- Google AdSense Code -->
                {{-- Add your Google AdSense code here --}}
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <!-- Title and Description -->
        <div class="col-12 mb-4">
            <h1 class="text-primary mb-3">Sri Lanka Criminal Procedure Code Database</h1>
            <p class="lead">Access comprehensive information about Sri Lankan Criminal Procedure Code sections, amendments, and legal references.</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-search me-2"></i>Search Criminal Procedure Code</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('criminal-procedure-code.public') }}" method="GET" class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                       placeholder="Search by section number, title or content..."
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-hash"></i>
                                </span>
                                <input type="number" name="section_number" class="form-control"
                                       placeholder="Filter by section number"
                                       value="{{ request('section_number') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-1"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sections List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>Criminal Procedure Code Sections</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Chapter</th>
                                    <th>Section Number</th>
                                    <th>Sub Section</th>
                                    <th>Section Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr>
                                    <td>
                                        <strong>{{ $section->chapter_name }}</strong>
                                        @if($section->sub_chapter_name)
                                            <br>
                                            <small class="text-muted">{{ $section->sub_chapter_name }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $section->section_number }}</td>
                                    <td>{{ $section->sub_section_number }}</td>
                                    <td>{{ $section->name_of_the_section }}</td>
                                    <td>
                                        <div class="access-section">
                                            <a href="{{ route('criminal-procedure-code.public.show', $section) }}" class="btn btn-sm btn-primary" title="View Details">
                                                <i class="bi bi-eye"></i> Preview
                                            </a>
                                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-success ms-1" title="Full Access">
                                                <i class="bi bi-shield-lock"></i> Full Access
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $sections->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Additional functionality can be added here if needed
});
</script>
@endpush

@push('styles')
<style>
.ad-space {
    min-height: 90px;
    background-color: #f8f9fa;
    border: 1px dashed #dee2e6;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.access-section {
    display: flex;
    align-items: center;
}

.access-section .btn {
    white-space: nowrap;
    font-size: 0.85rem;
}
</style>
@endpush

@endsection
