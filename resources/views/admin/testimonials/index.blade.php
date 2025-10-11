@extends('admin.layouts.admin')

@section('title', 'Testimonials Management - EZofz.lk')
@section('page-title', 'Testimonials Management')
@section('page-description', 'Review, approve, and manage user testimonials and feedback')
@section('breadcrumb')
    <li class="breadcrumb-item active">Testimonials</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Enhanced Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-1 fw-bold text-primary">
                <i class="bi bi-chat-quote me-2"></i>Testimonials Management
            </h2>
            <p class="text-muted mb-0">Manage customer feedback and reviews</p>
        </div>
        <div class="d-flex gap-2">
            <span class="badge bg-primary fs-6 px-3 py-2">
                <i class="bi bi-collection me-1"></i>Total: {{ $testimonials->total() }}
            </span>
            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-funnel me-1"></i>Filter
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?status=all">All Testimonials</a></li>
                    <li><a class="dropdown-item" href="?status=pending">Pending Review</a></li>
                    <li><a class="dropdown-item" href="?status=approved">Approved</a></li>
                    <li><a class="dropdown-item" href="?status=rejected">Rejected</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="?featured=true">Featured Only</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Enhanced Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white position-relative overflow-hidden h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold counter-value">
                                {{ \App\Models\Testimonial::where('status', 'pending')->count() }}
                            </h4>
                            <p class="mb-1 opacity-75">Pending Review</p>
                            <small class="opacity-50">
                                <i class="bi bi-clock-history me-1"></i>Awaiting Approval
                            </small>
                        </div>
                        <div class="icon-box">
                            <i class="bi bi-hourglass-split fs-1"></i>
                        </div>
                    </div>
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar bg-white bg-opacity-30" style="width: 100%"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white position-relative overflow-hidden h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold counter-value">
                                {{ \App\Models\Testimonial::where('status', 'approved')->count() }}
                            </h4>
                            <p class="mb-1 opacity-75">Approved</p>
                            <small class="opacity-50">
                                <i class="bi bi-check-circle me-1"></i>Published Reviews
                            </small>
                        </div>
                        <div class="icon-box">
                            <i class="bi bi-check-circle-fill fs-1"></i>
                        </div>
                    </div>
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar bg-white bg-opacity-30" style="width: 100%"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white position-relative overflow-hidden h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold counter-value">
                                {{ \App\Models\Testimonial::where('is_featured', true)->count() }}
                            </h4>
                            <p class="mb-1 opacity-75">Featured</p>
                            <small class="opacity-50">
                                <i class="bi bi-star-fill me-1"></i>Homepage Display
                            </small>
                        </div>
                        <div class="icon-box">
                            <i class="bi bi-star-fill fs-1"></i>
                        </div>
                    </div>
                </div>
                <div class="progress" style="height: 3px;">
                    @php $featuredPercentage = (\App\Models\Testimonial::where('is_featured', true)->count() / 5) * 100; @endphp
                    <div class="progress-bar bg-white bg-opacity-30" style="width: {{ min($featuredPercentage, 100) }}%"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white position-relative overflow-hidden h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold counter-value">
                                {{ \App\Models\Testimonial::where('status', 'rejected')->count() }}
                            </h4>
                            <p class="mb-1 opacity-75">Rejected</p>
                            <small class="opacity-50">
                                <i class="bi bi-x-circle me-1"></i>Not Approved
                            </small>
                        </div>
                        <div class="icon-box">
                            <i class="bi bi-x-circle-fill fs-1"></i>
                        </div>
                    </div>
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar bg-white bg-opacity-30" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Testimonials Management Table -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1 fw-bold">
                        <i class="bi bi-chat-heart-fill me-2"></i>
                        Testimonials Management
                    </h5>
                    <p class="mb-0 opacity-75">Review and manage customer testimonials</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-light btn-sm" onclick="refreshTable()">
                        <i class="bi bi-arrow-clockwise me-1"></i>
                        Refresh
                    </button>
                    <button class="btn btn-light btn-sm" onclick="exportTestimonials()">
                        <i class="bi bi-download me-1"></i>
                        Export
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            @if($testimonials->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-borderless mb-0 align-middle" id="testimonialsTable">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small">Reviewer</th>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small">Rating</th>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small">Review Content</th>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small">Status</th>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small">Featured</th>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small">Date</th>
                                <th class="border-0 px-4 py-3 fw-semibold text-muted text-uppercase small text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                                <tr class="testimonial-row" data-id="{{ $testimonial->id }}">
                                    <td class="px-4 py-3">
                                        <input type="checkbox" class="form-check-input testimonial-checkbox" value="{{ $testimonial->id }}">
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-initial rounded-circle bg-primary bg-gradient me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <span class="text-white fw-bold">
                                                    {{ substr($testimonial->user->name, 0, 1) }}
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-semibold text-dark">{{ $testimonial->user->name }}</h6>
                                                <small class="text-muted">{{ $testimonial->user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="rating-stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $testimonial->rating)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star text-muted"></i>
                                                @endif
                                            @endfor
                                            <small class="text-muted ms-1">({{ $testimonial->rating }}/5)</small>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="review-content" style="max-width: 300px;">
                                            <p class="mb-1 text-dark">{{ Str::limit($testimonial->content, 100) }}</p>
                                            @if(strlen($testimonial->content) > 100)
                                                <button class="btn btn-link btn-sm p-0 text-primary" onclick="showFullContent('{{ $testimonial->id }}')">
                                                    <i class="bi bi-eye me-1"></i>Read more
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($testimonial->status === 'approved')
                                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-pill">
                                                <i class="bi bi-check-circle-fill me-1"></i>Approved
                                            </span>
                                        @elseif($testimonial->status === 'pending')
                                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1 rounded-pill">
                                                <i class="bi bi-hourglass-split me-1"></i>Pending
                                            </span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-pill">
                                                <i class="bi bi-x-circle-fill me-1"></i>Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($testimonial->is_featured)
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-pill">
                                                <i class="bi bi-star-fill me-1"></i>Featured
                                            </span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-1 rounded-pill">
                                                Regular
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-muted">
                                            <div class="fw-medium">{{ $testimonial->created_at->format('M d, Y') }}</div>
                                            <small>{{ $testimonial->created_at->format('g:i A') }}</small>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <div class="btn-group" role="group">
                                            @if($testimonial->status === 'pending')
                                                <button type="button" class="btn btn-outline-success btn-sm rounded-pill me-1"
                                                        onclick="updateStatus({{ $testimonial->id }}, 'approved')"
                                                        title="Approve Testimonial">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm rounded-pill me-1"
                                                        onclick="updateStatus({{ $testimonial->id }}, 'rejected')"
                                                        title="Reject Testimonial">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            @elseif($testimonial->status === 'approved')
                                                <button type="button" class="btn btn-outline-warning btn-sm rounded-pill me-1"
                                                        onclick="updateStatus({{ $testimonial->id }}, 'pending')"
                                                        title="Set to Pending">
                                                    <i class="bi bi-hourglass-split"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-{{ $testimonial->is_featured ? 'secondary' : 'primary' }} btn-sm rounded-pill me-1"
                                                        onclick="toggleFeatured({{ $testimonial->id }})"
                                                        title="{{ $testimonial->is_featured ? 'Remove from Featured' : 'Add to Featured' }}">
                                                    <i class="bi bi-star{{ $testimonial->is_featured ? '-fill' : '' }}"></i>
                                                </button>
                                            @endif

                                            <div class="dropdown d-inline">
                                                <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button"
                                                        data-bs-toggle="dropdown" title="More Actions">
                                                    <i class="bi bi-three-dots"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="showFullContent('{{ $testimonial->id }}')">
                                                            <i class="bi bi-eye me-2"></i>View Full Content
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="editTestimonial({{ $testimonial->id }})">
                                                            <i class="bi bi-pencil-square me-2"></i>Edit
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <button type="button" class="dropdown-item text-danger" onclick="deleteTestimonial({{ $testimonial->id }})">
                                                            <i class="bi bi-trash me-2"></i>Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Enhanced Pagination -->
                <div class="card-footer bg-light border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Showing <strong>{{ $testimonials->firstItem() }}</strong> to <strong>{{ $testimonials->lastItem() }}</strong>
                            of <strong>{{ $testimonials->total() }}</strong> testimonials
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="btn-group" role="group">
                                <input type="checkbox" class="btn-check" id="bulkActions">
                                <label class="btn btn-outline-secondary btn-sm" for="bulkActions">
                                    <i class="bi bi-check-square me-1"></i>Bulk Actions
                                </label>
                            </div>
                            {{ $testimonials->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="empty-state">
                        <div class="mb-4">
                            <i class="bi bi-chat-heart text-muted" style="font-size: 4rem;"></i>
                        </div>
                        <h4 class="text-muted mb-2">No Testimonials Found</h4>
                        <p class="text-muted mb-4">There are no testimonials to display. Customer reviews will appear here once submitted.</p>
                        <button class="btn btn-primary rounded-pill px-4" onclick="addSampleTestimonial()">
                            <i class="bi bi-plus-lg me-2"></i>Add Sample Testimonial
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
        </div>
    </div>
</div>

<!-- Enhanced Full Content Modal -->
<div class="modal fade" id="fullContentModal" tabindex="-1" role="dialog" aria-labelledby="fullContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title fw-bold" id="fullContentModalLabel">
                    <i class="bi bi-chat-text me-2"></i>
                    Full Testimonial Content
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-2 text-center mb-3">
                        <div class="avatar-initial rounded-circle bg-primary bg-gradient d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <span class="text-white fw-bold fs-4" id="userInitial"></span>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h6 class="mb-1 fw-bold" id="userName"></h6>
                                <small class="text-muted" id="userEmail"></small>
                            </div>
                            <div class="rating-stars" id="userRating"></div>
                        </div>
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <div id="fullContentText" class="text-dark"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted">
                                <i class="bi bi-calendar-event me-1"></i>
                                Submitted on <span id="submissionDate"></span>
                            </small>
                            <div class="d-flex gap-2">
                                <span class="badge" id="statusBadge"></span>
                                <span class="badge" id="featuredBadge"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <div class="w-100 d-flex justify-content-between">
                    <div class="btn-group" role="group" id="modalActionButtons">
                        <!-- Dynamic action buttons will be inserted here -->
                    </div>
                    <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i>Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced testimonial data storage
    const testimonialData = {
        @foreach($testimonials as $testimonial)
            {{ $testimonial->id }}: {
                content: @json($testimonial->content),
                name: @json($testimonial->user->name),
                email: @json($testimonial->user->email),
                rating: {{ $testimonial->rating }},
                status: @json($testimonial->status),
                is_featured: {{ $testimonial->is_featured ? 'true' : 'false' }},
                created_at: @json($testimonial->created_at->format('M d, Y g:i A'))
            },
        @endforeach
    };

    // Enhanced modal display function
    function showFullContent(testimonialId) {
        const data = testimonialData[testimonialId];
        if (!data) return;

        // Populate modal content
        document.getElementById('userInitial').textContent = data.name.charAt(0);
        document.getElementById('userName').textContent = data.name;
        document.getElementById('userEmail').textContent = data.email;
        document.getElementById('fullContentText').textContent = data.content;
        document.getElementById('submissionDate').textContent = data.created_at;

        // Generate rating stars
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            starsHtml += `<i class="bi bi-star${i <= data.rating ? '-fill text-warning' : ' text-muted'}"></i>`;
        }
        document.getElementById('userRating').innerHTML = starsHtml;

        // Update status badge
        const statusBadge = document.getElementById('statusBadge');
        statusBadge.className = `badge bg-${data.status === 'approved' ? 'success' : (data.status === 'rejected' ? 'danger' : 'warning')}-subtle text-${data.status === 'approved' ? 'success' : (data.status === 'rejected' ? 'danger' : 'warning')} border border-${data.status === 'approved' ? 'success' : (data.status === 'rejected' ? 'danger' : 'warning')}-subtle px-2 py-1 rounded-pill`;
        statusBadge.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);

        // Update featured badge
        const featuredBadge = document.getElementById('featuredBadge');
        featuredBadge.className = `badge bg-${data.is_featured ? 'primary' : 'secondary'}-subtle text-${data.is_featured ? 'primary' : 'secondary'} border border-${data.is_featured ? 'primary' : 'secondary'}-subtle px-2 py-1 rounded-pill`;
        featuredBadge.innerHTML = `<i class="bi bi-star${data.is_featured ? '-fill' : ''} me-1"></i>${data.is_featured ? 'Featured' : 'Regular'}`;

        // Generate action buttons
        let actionButtons = '';
        if (data.status === 'pending') {
            actionButtons += `
                <button class="btn btn-success btn-sm rounded-pill me-2" onclick="updateStatus(${testimonialId}, 'approved')">
                    <i class="bi bi-check-lg me-1"></i>Approve
                </button>
                <button class="btn btn-danger btn-sm rounded-pill me-2" onclick="updateStatus(${testimonialId}, 'rejected')">
                    <i class="bi bi-x-lg me-1"></i>Reject
                </button>
            `;
        } else if (data.status === 'approved') {
            actionButtons += `
                <button class="btn btn-warning btn-sm rounded-pill me-2" onclick="updateStatus(${testimonialId}, 'pending')">
                    <i class="bi bi-hourglass-split me-1"></i>Set Pending
                </button>
            `;
        }
        actionButtons += `
            <button class="btn btn-${data.is_featured ? 'outline-secondary' : 'outline-primary'} btn-sm rounded-pill me-2" onclick="toggleFeatured(${testimonialId})">
                <i class="bi bi-star${data.is_featured ? '-fill' : ''} me-1"></i>${data.is_featured ? 'Unfeature' : 'Feature'}
            </button>
        `;
        document.getElementById('modalActionButtons').innerHTML = actionButtons;

        // Show modal
        new bootstrap.Modal(document.getElementById('fullContentModal')).show();
    }

    // Enhanced status update with toast notifications
    function updateStatus(testimonialId, status) {
        const actionText = status === 'approved' ? 'approve' : (status === 'rejected' ? 'reject' : 'set to pending');

        if(confirm(`Are you sure you want to ${actionText} this testimonial?`)) {
            showLoadingState(true);

            fetch(`/admin/testimonials/${testimonialId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({status: status})
            })
            .then(response => response.json())
            .then(data => {
                showLoadingState(false);
                if(data.success) {
                    showToast('success', `Testimonial ${actionText} successfully!`);
                    setTimeout(() => location.reload(), 1500);
                } else {
                    showToast('error', 'Error updating testimonial status');
                }
            })
            .catch(error => {
                showLoadingState(false);
                showToast('error', 'Network error occurred');
            });
        }
    }

    // Enhanced featured toggle
    function toggleFeatured(testimonialId) {
        const data = testimonialData[testimonialId];
        const action = data.is_featured ? 'remove from featured' : 'make featured';

        if(confirm(`Are you sure you want to ${action}?`)) {
            showLoadingState(true);

            fetch(`/admin/testimonials/${testimonialId}/toggle-featured`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                showLoadingState(false);
                if(data.success) {
                    showToast('success', 'Featured status updated successfully!');
                    setTimeout(() => location.reload(), 1500);
                } else {
                    showToast('error', 'Error updating featured status');
                }
            })
            .catch(error => {
                showLoadingState(false);
                showToast('error', 'Network error occurred');
            });
        }
    }

    // Enhanced delete function
    function deleteTestimonial(testimonialId) {
        if(confirm('⚠️ Are you sure you want to delete this testimonial? This action cannot be undone.')) {
            showLoadingState(true);

            fetch(`/admin/testimonials/${testimonialId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                showLoadingState(false);
                if(data.success) {
                    showToast('success', 'Testimonial deleted successfully!');
                    document.querySelector(`[data-id="${testimonialId}"]`).remove();
                } else {
                    showToast('error', 'Error deleting testimonial');
                }
            })
            .catch(error => {
                showLoadingState(false);
                showToast('error', 'Network error occurred');
            });
        }
    }

    // Additional utility functions
    function refreshTable() {
        showLoadingState(true);
        location.reload();
    }

    function exportTestimonials() {
        showToast('info', 'Export functionality coming soon!');
    }

    function addSampleTestimonial() {
        showToast('info', 'Sample testimonial feature coming soon!');
    }

    function editTestimonial(id) {
        showToast('info', 'Edit functionality coming soon!');
    }

    // Bulk selection functionality
    document.getElementById('selectAll')?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.testimonial-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Loading state management
    function showLoadingState(show) {
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(btn => {
            if (show) {
                btn.disabled = true;
                btn.style.opacity = '0.6';
            } else {
                btn.disabled = false;
                btn.style.opacity = '1';
            }
        });
    }

    // Toast notification system
    function showToast(type, message) {
        // Create toast container if it doesn't exist
        let toastContainer = document.getElementById('toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toast-container';
            toastContainer.className = 'position-fixed top-0 end-0 p-3';
            toastContainer.style.zIndex = '9999';
            document.body.appendChild(toastContainer);
        }

        // Create toast element
        const toastId = 'toast-' + Date.now();
        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center text-white bg-${type === 'success' ? 'success' : (type === 'error' ? 'danger' : 'info')} border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi bi-${type === 'success' ? 'check-circle-fill' : (type === 'error' ? 'exclamation-triangle-fill' : 'info-circle-fill')} me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `;

        toastContainer.insertAdjacentHTML('beforeend', toastHtml);
        const toast = new bootstrap.Toast(document.getElementById(toastId));
        toast.show();

        // Remove toast element after it's hidden
        document.getElementById(toastId).addEventListener('hidden.bs.toast', function() {
            this.remove();
        });
    }
</script>
@endpush
