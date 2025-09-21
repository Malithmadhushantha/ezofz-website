@extends('admin.layouts.admin')

@section('title', 'Manage Testimonials')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Manage Testimonials</h1>
                <div class="badge badge-info">
                    Total: {{ $testimonials->total() }}
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pending Review</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Testimonial::where('status', 'pending')->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Approved</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Testimonial::where('status', 'approved')->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Featured</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Testimonial::where('is_featured', true)->count() }}/5
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-star fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Rejected</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Testimonial::where('status', 'rejected')->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-times fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Testimonials</h6>
                </div>
                <div class="card-body">
                    @if($testimonials->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="testimonialsTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Rating</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-3">
                                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                            <i class="fas fa-user text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="font-weight-bold">{{ $testimonial->user->name }}</div>
                                                        <div class="small text-muted">{{ $testimonial->user->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                                @endfor
                                                <span class="ml-1">({{ $testimonial->rating }})</span>
                                            </td>
                                            <td>
                                                <div style="max-width: 300px;">
                                                    {{ Str::limit($testimonial->content, 100) }}
                                                    @if(strlen($testimonial->content) > 100)
                                                        <button class="btn btn-link btn-sm p-0 ml-1" onclick="showFullContent('{{ $testimonial->id }}')">
                                                            Read more
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $testimonial->status === 'approved' ? 'success' : ($testimonial->status === 'rejected' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($testimonial->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($testimonial->is_featured)
                                                    <i class="fas fa-star text-warning" title="Featured"></i>
                                                @else
                                                    <i class="far fa-star text-muted" title="Not Featured"></i>
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    @if($testimonial->status === 'pending')
                                                        <button class="btn btn-success btn-sm" onclick="updateStatus({{ $testimonial->id }}, 'approved')" title="Approve">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" onclick="updateStatus({{ $testimonial->id }}, 'rejected')" title="Reject">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    @elseif($testimonial->status === 'approved')
                                                        <button class="btn btn-warning btn-sm" onclick="updateStatus({{ $testimonial->id }}, 'pending')" title="Set to Pending">
                                                            <i class="fas fa-clock"></i>
                                                        </button>
                                                        <button class="btn btn-{{ $testimonial->is_featured ? 'secondary' : 'info' }} btn-sm"
                                                                onclick="toggleFeatured({{ $testimonial->id }})"
                                                                title="{{ $testimonial->is_featured ? 'Remove from Featured' : 'Add to Featured' }}">
                                                            <i class="fas fa-star"></i>
                                                        </button>
                                                    @endif
                                                    <button class="btn btn-danger btn-sm" onclick="deleteTestimonial({{ $testimonial->id }})" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $testimonials->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-comment-alt fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No testimonials yet</h5>
                            <p class="text-muted">Testimonials will appear here once users start submitting them.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full Content Modal -->
<div class="modal fade" id="fullContentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Full Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="fullContentText"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Store full content for modal display
    const testimonialContents = {
        @foreach($testimonials as $testimonial)
            {{ $testimonial->id }}: @json($testimonial->content),
        @endforeach
    };

    function showFullContent(testimonialId) {
        document.getElementById('fullContentText').innerText = testimonialContents[testimonialId];
        $('#fullContentModal').modal('show');
    }

    function updateStatus(testimonialId, status) {
        if (confirm(`Are you sure you want to ${status} this testimonial?`)) {
            fetch(`/admin/testimonials/${testimonialId}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the testimonial status.');
            });
        }
    }

    function toggleFeatured(testimonialId) {
        fetch(`/admin/testimonials/${testimonialId}/featured`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the featured status.');
        });
    }

    function deleteTestimonial(testimonialId) {
        if (confirm('Are you sure you want to delete this testimonial? This action cannot be undone.')) {
            fetch(`/admin/testimonials/${testimonialId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the testimonial.');
            });
        }
    }
</script>
@endpush
