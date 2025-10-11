@extends('layouts.app')

@section('title', "Section {$section->section_number} - {$section->name_of_the_section} | Penal Code Database")

@section('content')
<div class="container my-4">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('penal-code.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>Back to All Sections
        </a>
    </div>

    <!-- User Actions Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <div>
                    <h4 class="mb-1">Section {{ $section->section_number }}</h4>
                    <p class="text-muted mb-0">{{ $section->name_of_the_section }}</p>
                </div>
                <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
                    <button class="btn {{ $isStarred ? 'btn-warning' : 'btn-outline-warning' }}"
                            onclick="toggleStar({{ $section->id }})"
                            id="star-btn-{{ $section->id }}"
                            title="{{ $isStarred ? 'Remove from Starred' : 'Add to Starred' }}">
                        <i class="bi bi-star{{ $isStarred ? '-fill' : '' }} me-2"></i>
                        <span class="star-text">{{ $isStarred ? 'Starred' : 'Star' }}</span>
                    </button>
                    <button class="btn {{ $isLiked ? 'btn-danger' : 'btn-outline-danger' }}"
                            onclick="toggleLike({{ $section->id }})"
                            id="like-btn-{{ $section->id }}"
                            title="{{ $isLiked ? 'Unlike' : 'Like' }}">
                        <i class="bi bi-heart{{ $isLiked ? '-fill' : '' }} me-2"></i>
                        <span class="like-text">{{ $isLiked ? 'Liked' : 'Like' }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- User Notes (Mobile-First) -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-journal-text me-2"></i>Your Notes
                    </h5>
                    @if($userNote)
                    <div class="btn-group">
                        <button class="btn btn-sm btn-light" onclick="editNote()" title="Edit Note">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-light" onclick="confirmDeleteNote({{ $section->id }})" title="Delete Note">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="note-editor">
                        <div id="note-display" class="mb-3 p-3 bg-light rounded{{ !$userNote ? ' d-none' : '' }}">
                            <p class="mb-0">{{ $userNote }}</p>
                        </div>
                        <div id="note-form" class="{{ $userNote ? 'd-none' : '' }}">
                            <textarea class="form-control mb-2"
                                      id="note-{{ $section->id }}"
                                      rows="4"
                                      placeholder="Add your notes here...">{{ $userNote }}</textarea>
                            <div class="d-flex flex-column flex-sm-row gap-2">
                                <button class="btn btn-success flex-grow-1" onclick="saveNote({{ $section->id }})">
                                    <i class="bi bi-save me-1"></i>Save Note
                                </button>
                                @if($userNote)
                                <button class="btn btn-secondary" onclick="cancelEdit()">
                                    <i class="bi bi-x me-1"></i>Cancel
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12">
            <!-- Main Section Details -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>Section Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <h6 class="text-primary">Chapter</h6>
                            <p class="mb-1">{{ $section->chapter_name }}</p>
                            @if($section->sub_chapter_name)
                                <small class="text-muted">{{ $section->sub_chapter_name }}</small>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <h6 class="text-primary">Section Number</h6>
                            <p class="mb-1">{{ $section->section_number }}</p>
                            @if($section->sub_section_number)
                                <small class="text-muted">{{ $section->sub_section_number }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="text-primary">Section Name</h6>
                        <p class="mb-0">{{ $section->name_of_the_section }}</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="text-primary">Section Content</h6>
                        <div class="content-box p-3 bg-light rounded">
                            {!! nl2br(e($section->section_content)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Illustrations -->
            @if($section->illustrations_1 || $section->illustrations_2 || $section->illustrations_3)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Illustrations</h5>
                </div>
                <div class="card-body">
                    @if($section->illustrations_1)
                    <div class="mb-3">
                        <h6 class="text-primary">Illustration 1</h6>
                        <div class="content-box p-3 bg-light rounded">
                            {!! nl2br(e($section->illustrations_1)) !!}
                        </div>
                    </div>
                    @endif

                    @if($section->illustrations_2)
                    <div class="mb-3">
                        <h6 class="text-primary">Illustration 2</h6>
                        <div class="content-box p-3 bg-light rounded">
                            {!! nl2br(e($section->illustrations_2)) !!}
                        </div>
                    </div>
                    @endif

                    @if($section->illustrations_3)
                    <div class="mb-3">
                        <h6 class="text-primary">Illustration 3</h6>
                        <div class="content-box p-3 bg-light rounded">
                            {!! nl2br(e($section->illustrations_3)) !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Explanations -->
            @if($section->explanation_1 || $section->explanation_2 || $section->explanation_3)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Explanations</h5>
                </div>
                <div class="card-body">
                    @if($section->explanation_1)
                    <div class="mb-3">
                        <h6 class="text-primary">Explanation 1</h6>
                        <div class="content-box p-3 bg-light rounded">
                            {!! nl2br(e($section->explanation_1)) !!}
                        </div>
                    </div>
                    @endif

                    @if($section->explanation_2)
                    <div class="mb-3">
                        <h6 class="text-primary">Explanation 2</h6>
                        <div class="content-box p-3 bg-light rounded">
                            {!! nl2br(e($section->explanation_2)) !!}
                        </div>
                    </div>
                    @endif

                    @if($section->explanation_3)
                    <div class="mb-3">
                        <h6 class="text-primary">Explanation 3</h6>
                        <div class="content-box p-3 bg-light rounded">
                            {!! nl2br(e($section->explanation_3)) !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>

        <div class="col-lg-4 col-md-12">
            <!-- Quick Actions Sidebar -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-speedometer2 me-2"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('penal-code.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-arrow-left me-2"></i>Back to All Sections
                        </a>
                        <button class="btn btn-outline-secondary btn-sm" onclick="window.print()">
                            <i class="bi bi-printer me-2"></i>Print Section
                        </button>
                        <button class="btn btn-outline-info btn-sm" onclick="shareSection()">
                            <i class="bi bi-share me-2"></i>Share Section
                        </button>
                    </div>
                </div>
            </div>

            <!-- Section Statistics -->
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-graph-up me-2"></i>Section Details
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 border-end">
                            <h6 class="text-muted mb-1">Illustrations</h6>
                            <h4 class="mb-0 text-primary">
                                {{ collect([$section->illustrations_1, $section->illustrations_2, $section->illustrations_3])->filter()->count() }}
                            </h4>
                        </div>
                        <div class="col-6">
                            <h6 class="text-muted mb-1">Explanations</h6>
                            <h4 class="mb-0 text-success">
                                {{ collect([$section->explanation_1, $section->explanation_2, $section->explanation_3])->filter()->count() }}
                            </h4>
                        </div>
                    </div>
                    @if($section->amendments->count() > 0)
                    <hr>
                    <div class="text-center">
                        <h6 class="text-muted mb-1">Amendments</h6>
                        <h4 class="mb-0 text-warning">{{ $section->amendments->count() }}</h4>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Amendments History (Full Width for Better Readability) -->
    @if($section->amendments->count() > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history me-2"></i>Amendments History
                        <span class="badge bg-dark ms-2">{{ $section->amendments->count() }} {{ Str::plural('Amendment', $section->amendments->count()) }}</span>
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="accordion" id="amendments-{{ $section->id }}">
                        @foreach($section->amendments->sortByDesc('amendment_date') as $amendment)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#amendment-{{ $section->id }}-{{ $amendment->id }}">
                                    <div class="d-flex align-items-center w-100">
                                        <span class="badge bg-primary me-3">Amendment {{ $amendment->amendment_number }}</span>
                                        <div class="flex-grow-1">
                                            <strong>{{ $amendment->amendment_date->format('F j, Y') }}</strong>
                                            <small class="text-muted ms-2">({{ $amendment->amendment_date->diffForHumans() }})</small>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="amendment-{{ $section->id }}-{{ $amendment->id }}"
                                 class="accordion-collapse collapse"
                                 data-bs-parent="#amendments-{{ $section->id }}">
                                <div class="accordion-body bg-light">
                                    <div class="amendment-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-primary mb-3">
                                                    <i class="bi bi-file-text me-1"></i>Amendment Content
                                                </h6>
                                                <div class="content-box p-3 bg-white rounded mb-3 border">
                                                    {!! nl2br(e($amendment->amendment_content)) !!}
                                                </div>
                                            </div>
                                        </div>

                                        @if($amendment->illustrations_1 || $amendment->illustrations_2 || $amendment->illustrations_3)
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <h6 class="text-primary mb-2">
                                                    <i class="bi bi-lightbulb me-1"></i>Illustrations
                                                </h6>
                                                <div class="illustrations">
                                                    @if($amendment->illustrations_1)
                                                    <div class="illustration p-3 bg-white rounded mb-2 border-start border-primary border-3">
                                                        <strong class="text-primary">Illustration 1:</strong>
                                                        <p class="mb-0 mt-1">{{ $amendment->illustrations_1 }}</p>
                                                    </div>
                                                    @endif
                                                    @if($amendment->illustrations_2)
                                                    <div class="illustration p-3 bg-white rounded mb-2 border-start border-primary border-3">
                                                        <strong class="text-primary">Illustration 2:</strong>
                                                        <p class="mb-0 mt-1">{{ $amendment->illustrations_2 }}</p>
                                                    </div>
                                                    @endif
                                                    @if($amendment->illustrations_3)
                                                    <div class="illustration p-3 bg-white rounded mb-2 border-start border-primary border-3">
                                                        <strong class="text-primary">Illustration 3:</strong>
                                                        <p class="mb-0 mt-1">{{ $amendment->illustrations_3 }}</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($amendment->explanation_1 || $amendment->explanation_2 || $amendment->explanation_3)
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <h6 class="text-primary mb-2">
                                                    <i class="bi bi-question-circle me-1"></i>Explanations
                                                </h6>
                                                <div class="explanations">
                                                    @if($amendment->explanation_1)
                                                    <div class="explanation p-3 bg-white rounded mb-2 border-start border-success border-3">
                                                        <strong class="text-success">Explanation 1:</strong>
                                                        <p class="mb-0 mt-1">{{ $amendment->explanation_1 }}</p>
                                                    </div>
                                                    @endif
                                                    @if($amendment->explanation_2)
                                                    <div class="explanation p-3 bg-white rounded mb-2 border-start border-success border-3">
                                                        <strong class="text-success">Explanation 2:</strong>
                                                        <p class="mb-0 mt-1">{{ $amendment->explanation_2 }}</p>
                                                    </div>
                                                    @endif
                                                    @if($amendment->explanation_3)
                                                    <div class="explanation p-3 bg-white rounded mb-2 border-start border-success border-3">
                                                        <strong class="text-success">Explanation 3:</strong>
                                                        <p class="mb-0 mt-1">{{ $amendment->explanation_3 }}</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
function editNote() {
    document.getElementById('note-display').classList.add('d-none');
    document.getElementById('note-form').classList.remove('d-none');
}

function cancelEdit() {
    document.getElementById('note-form').classList.add('d-none');
    document.getElementById('note-display').classList.remove('d-none');
}

function saveNote(sectionId) {
    const noteTextarea = document.getElementById(`note-${sectionId}`);
    const note = noteTextarea.value;

    fetch(`/penal-code/${sectionId}/note`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ note })
    })
    .then(async response => {
        let data;
        try { data = await response.json(); } catch { data = {}; }
        if (!response.ok) {
            throw new Error(data.message || 'Error saving note');
        }
        return data;
    })
    .then(data => {
        // Update the display
        const noteDisplay = document.getElementById('note-display');
        noteDisplay.querySelector('p').textContent = note;

        // Show/hide elements
        noteDisplay.classList.remove('d-none');
        document.getElementById('note-form').classList.add('d-none');

        // Update header buttons for the notes card
        const notesHeader = document.querySelector('.card-header.bg-success');
        if (!notesHeader.querySelector('.btn-group') && note) {
            const btnGroup = document.createElement('div');
            btnGroup.className = 'btn-group';
            btnGroup.innerHTML = `
                <button class="btn btn-sm btn-light" onclick="editNote()" title="Edit Note">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-sm btn-light" onclick="confirmDeleteNote(${sectionId})" title="Delete Note">
                    <i class="bi bi-trash"></i>
                </button>
            `;
            notesHeader.appendChild(btnGroup);
        }

        showNotification('Note saved successfully', 'success');
    })
    .catch(error => {
        showNotification(error.message || 'Error saving note', 'error');
    });
}

function confirmDeleteNote(sectionId) {
    if (confirm('Are you sure you want to delete this note?')) {
        deleteNote(sectionId);
    }
}

function deleteNote(sectionId) {
    fetch(`/penal-code/${sectionId}/note`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        // Clear the textarea
        document.getElementById(`note-${sectionId}`).value = '';

        // Hide the display and buttons
        document.getElementById('note-display').classList.add('d-none');
        document.getElementById('note-form').classList.remove('d-none');

        // Remove the edit/delete buttons
        const btnGroup = document.querySelector('.card-header .btn-group');
        if (btnGroup) {
            btnGroup.remove();
        }

        showNotification('Note deleted successfully', 'success');
    })
    .catch(error => {
        showNotification('Error deleting note', 'error');
    });
}

function toggleStar(sectionId) {
    fetch(`/penal-code/${sectionId}/star`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        const btn = document.getElementById(`star-btn-${sectionId}`);
        const icon = btn.querySelector('i');
        const text = btn.querySelector('.star-text');

        if (data.isStarred) {
            btn.classList.remove('btn-outline-warning');
            btn.classList.add('btn-warning');
            icon.classList.replace('bi-star', 'bi-star-fill');
            text.textContent = 'Starred';
            btn.title = 'Remove from Starred';
        } else {
            btn.classList.remove('btn-warning');
            btn.classList.add('btn-outline-warning');
            icon.classList.replace('bi-star-fill', 'bi-star');
            text.textContent = 'Star';
            btn.title = 'Add to Starred';
        }

        showNotification(data.message, 'success');
    })
    .catch(error => {
        showNotification('Error updating star status', 'error');
    });
}

function toggleLike(sectionId) {
    fetch(`/penal-code/${sectionId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        const btn = document.getElementById(`like-btn-${sectionId}`);
        const icon = btn.querySelector('i');
        const text = btn.querySelector('.like-text');

        if (data.isLiked) {
            btn.classList.remove('btn-outline-danger');
            btn.classList.add('btn-danger');
            icon.classList.replace('bi-heart', 'bi-heart-fill');
            text.textContent = 'Liked';
            btn.title = 'Unlike';
        } else {
            btn.classList.remove('btn-danger');
            btn.classList.add('btn-outline-danger');
            icon.classList.replace('bi-heart-fill', 'bi-heart');
            text.textContent = 'Like';
            btn.title = 'Like';
        }

        showNotification(data.message, 'success');
    })
    .catch(error => {
        showNotification('Error updating like status', 'error');
    });
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
    notification.style.zIndex = '9999';
    notification.textContent = message;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function shareSection() {
    const sectionTitle = document.querySelector('h4').textContent;
    const url = window.location.href;

    if (navigator.share) {
        // Use Web Share API if available (mobile devices)
        navigator.share({
            title: sectionTitle,
            text: `Check out this Penal Code section: ${sectionTitle}`,
            url: url
        }).then(() => {
            showNotification('Section shared successfully!', 'success');
        }).catch(err => {
            fallbackShare(url, sectionTitle);
        });
    } else {
        fallbackShare(url, sectionTitle);
    }
}

function fallbackShare(url, title) {
    // Fallback: copy to clipboard
    navigator.clipboard.writeText(url).then(() => {
        showNotification('Section URL copied to clipboard!', 'info');
    }).catch(err => {
        // Final fallback: show URL in alert
        prompt('Copy this URL to share:', url);
    });
}

function confirmDeleteNote(sectionId) {
    if (confirm('Are you sure you want to delete this note?')) {
        deleteNote(sectionId);
    }
}

function deleteNote(sectionId) {
    fetch(`/penal-code/${sectionId}/note`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        // Clear the note display and form
        document.querySelector('#note-display').classList.add('d-none');
        document.querySelector('#note-display p').textContent = '';
        document.querySelector(`#note-${sectionId}`).value = '';
        document.querySelector('#note-form').classList.remove('d-none');

        // Hide the edit/delete buttons from the notes card header
        const btnGroup = document.querySelector('.card-header.bg-success .btn-group');
        if (btnGroup) {
            btnGroup.remove();
        }

        showNotification(data.message, 'success');
    })
    .catch(error => {
        showNotification('Error deleting note', 'error');
    });
}
</script>
@endpush

@push('styles')
<style>
.content-box {
    border: 1px solid rgba(0, 0, 0, 0.125);
    background-color: #fff;
    line-height: 1.6;
}

.card {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: none;
}

.card:hover {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

.accordion-button {
    background-color: #f8f9fa;
    color: #495057;
    font-weight: 500;
    border: none;
    padding: 1rem 1.25rem;
}

.accordion-button:not(.collapsed) {
    background-color: var(--bs-warning);
    color: #000;
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125);
}

.accordion-button:focus {
    box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    border-color: transparent;
}

.badge {
    font-weight: 600;
    font-size: 0.75em;
}

.note-editor {
    position: relative;
}

.illustration, .explanation {
    transition: all 0.3s ease;
}

.illustration:hover, .explanation:hover {
    transform: translateX(5px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Mobile Responsiveness */
@media (max-width: 992px) {
    .col-lg-4 {
        margin-top: 1rem;
    }

    .card-body {
        padding: 1rem;
    }

    .accordion-button {
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 768px) {
    .container {
        padding-left: 10px;
        padding-right: 10px;
    }

    .card-header h5 {
        font-size: 1.1rem;
    }

    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }

    .accordion-button {
        padding: 0.75rem;
        font-size: 0.85rem;
    }

    .badge {
        font-size: 0.7rem;
        padding: 0.25em 0.5em;
    }

    .illustration, .explanation {
        padding: 1rem !important;
        margin-bottom: 1rem;
    }

    .content-box {
        padding: 1rem !important;
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .d-flex.gap-2 {
        flex-direction: column !important;
    }

    .flex-sm-row {
        flex-direction: column !important;
    }

    .card-header {
        padding: 0.75rem;
    }

    .card-body {
        padding: 0.75rem;
    }

    .row.text-center .col-6 {
        margin-bottom: 1rem;
    }

    .border-end {
        border-right: none !important;
        border-bottom: 1px solid #dee2e6 !important;
        padding-bottom: 1rem;
    }
}

/* Print Styles */
@media print {
    .btn, .card-header .btn-group {
        display: none !important;
    }

    .card {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
    }

    .accordion-button {
        display: none;
    }

    .accordion-collapse {
        display: block !important;
    }

    .bg-light, .bg-primary, .bg-warning, .bg-success, .bg-info, .bg-secondary {
        background-color: #f8f9fa !important;
        color: #000 !important;
    }
}

/* Enhanced Visual Feedback */
.btn {
    transition: all 0.2s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.card-header {
    background: linear-gradient(135deg, var(--bs-primary), var(--bs-primary-dark)) !important;
}

.card-header.bg-success {
    background: linear-gradient(135deg, var(--bs-success), #0f5132) !important;
}

.card-header.bg-info {
    background: linear-gradient(135deg, var(--bs-info), #055160) !important;
}

.card-header.bg-secondary {
    background: linear-gradient(135deg, var(--bs-secondary), #2c2d30) !important;
}

.card-header.bg-warning {
    background: linear-gradient(135deg, var(--bs-warning), #664d03) !important;
}
</style>
@endpush

@endsection
