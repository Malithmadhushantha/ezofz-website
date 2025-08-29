@extends('layouts.app')

@section('title', 'Sri Lanka Penal Code Database - Free Online Access to Legal Information')
@section('meta_description', 'Access Sri Lanka\'s comprehensive Penal Code database. Search and explore legal sections, chapters, and amendments. Free legal resource for lawyers, students, and the public.')
@section('meta_keywords', 'Sri Lanka Penal Code, legal database, law sections, criminal law, legal reference, Sri Lankan law')

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
            <h1 class="text-primary mb-3">Sri Lanka Penal Code Database</h1>
            <p class="lead">Access comprehensive information about Sri Lankan Penal Code sections, amendments, and legal references.</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-search me-2"></i>Search Penal Code</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('penal-code.public') }}" method="GET" class="row g-3">
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
                    <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>Penal Code Sections</h5>
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
                                            <button class="btn btn-sm btn-primary show-access-message" title="View Details">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <div class="access-message collapse">
                                                <div class="card mt-2 border-warning">
                                                    <div class="card-body p-3">
                                                        <div class="d-flex align-items-center text-warning mb-2">
                                                            <i class="bi bi-lock-fill me-2"></i>
                                                            <strong>Access Required</strong>
                                                        </div>
                                                        <p class="mb-2 small">Registration required to view content.</p>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                                                <i class="bi bi-box-arrow-in-right"></i> Login
                                                            </a>
                                                            <a href="{{ route('register') }}" class="btn btn-primary">
                                                                <i class="bi bi-person-plus"></i> Register
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize buttons to show access message
    const viewButtons = document.querySelectorAll('.show-access-message');
    const allMessages = document.querySelectorAll('.access-message');

    viewButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Hide all other messages first
            allMessages.forEach(msg => {
                if (msg !== this.nextElementSibling) {
                    msg.classList.remove('show');
                }
            });

            // Toggle this message
            const message = this.closest('.access-section').querySelector('.access-message');
            message.classList.toggle('show');
        });
    });

    // Hide messages when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.access-section')) {
            allMessages.forEach(msg => msg.classList.remove('show'));
        }
    });
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
    position: relative;
}

.access-message {
    position: absolute;
    top: 100%;
    right: 0;
    width: 250px;
    z-index: 1000;
    margin-top: 5px;
}

.access-message .card {
    margin: 0;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.access-message.collapse:not(.show) {
    display: none;
}

.access-message.collapse.show {
    display: block;
}

.access-message .btn-group {
    width: 100%;
}

.access-message .btn {
    flex: 1;
    white-space: nowrap;
    font-size: 0.8rem;
}

.access-message .btn i {
    font-size: 0.9rem;
}
</style>
@endpush

@endsection
