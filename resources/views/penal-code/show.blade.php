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
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Section {{ $section->section_number }}</h4>
                <div class="d-flex gap-2">
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

    <div class="row">
        <div class="col-md-8">
            <!-- Main Section Details -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Section Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-primary">Chapter</h6>
                            <p class="mb-1">{{ $section->chapter_name }}</p>
                            @if($section->sub_chapter_name)
                                <small class="text-muted">{{ $section->sub_chapter_name }}</small>
                            @endif
                        </div>
                        <div class="col-md-6">
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

        <div class="col-md-4">
            <!-- User Notes -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Your Notes</h5>
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
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary flex-grow-1" onclick="saveNote({{ $section->id }})">
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

            <!-- Amendments -->
            @if($section->amendments->count() > 0)
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Amendments History</h5>
                </div>
                <div class="card-body p-0">
                    <div class="accordion" id="amendments-{{ $section->id }}">
                        @foreach($section->amendments->sortByDesc('amendment_date') as $amendment)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#amendment-{{ $section->id }}-{{ $amendment->id }}">
                                    <span class="badge bg-primary me-2">Amendment {{ $amendment->amendment_number }}</span>
                                    {{ $amendment->amendment_date->format('Y-m-d') }}
                                </button>
                            </h2>
                            <div id="amendment-{{ $section->id }}-{{ $amendment->id }}"
                                 class="accordion-collapse collapse"
                                 data-bs-parent="#amendments-{{ $section->id }}">
                                <div class="accordion-body bg-light">
                                    <div class="amendment-content">
                                        <h6 class="text-primary mb-3">Amendment Content</h6>
                                        <div class="content-box p-3 bg-white rounded mb-3">
                                            {!! nl2br(e($amendment->amendment_content)) !!}
                                        </div>

                                        @if($amendment->illustrations_1 || $amendment->illustrations_2 || $amendment->illustrations_3)
                                        <h6 class="text-primary mb-2">Illustrations</h6>
                                        <div class="illustrations mb-3">
                                            @if($amendment->illustrations_1)
                                            <div class="illustration p-2 bg-white rounded mb-2">
                                                <strong class="text-muted">Illustration 1:</strong>
                                                <p class="mb-0">{{ $amendment->illustrations_1 }}</p>
                                            </div>
                                            @endif
                                            @if($amendment->illustrations_2)
                                            <div class="illustration p-2 bg-white rounded mb-2">
                                                <strong class="text-muted">Illustration 2:</strong>
                                                <p class="mb-0">{{ $amendment->illustrations_2 }}</p>
                                            </div>
                                            @endif
                                            @if($amendment->illustrations_3)
                                            <div class="illustration p-2 bg-white rounded mb-2">
                                                <strong class="text-muted">Illustration 3:</strong>
                                                <p class="mb-0">{{ $amendment->illustrations_3 }}</p>
                                            </div>
                                            @endif
                                        </div>
                                        @endif

                                        @if($amendment->explanation_1 || $amendment->explanation_2 || $amendment->explanation_3)
                                        <h6 class="text-primary mb-2">Explanations</h6>
                                        <div class="explanations">
                                            @if($amendment->explanation_1)
                                            <div class="explanation p-2 bg-white rounded mb-2">
                                                <strong class="text-muted">Explanation 1:</strong>
                                                <p class="mb-0">{{ $amendment->explanation_1 }}</p>
                                            </div>
                                            @endif
                                            @if($amendment->explanation_2)
                                            <div class="explanation p-2 bg-white rounded mb-2">
                                                <strong class="text-muted">Explanation 2:</strong>
                                                <p class="mb-0">{{ $amendment->explanation_2 }}</p>
                                            </div>
                                            @endif
                                            @if($amendment->explanation_3)
                                            <div class="explanation p-2 bg-white rounded mb-2">
                                                <strong class="text-muted">Explanation 3:</strong>
                                                <p class="mb-0">{{ $amendment->explanation_3 }}</p>
                                            </div>
                                            @endif
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
            @endif
        </div>
    </div>
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

        // Update header buttons
        const header = document.querySelector('.card-header');
        if (!header.querySelector('.btn-group') && note) {
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
            header.appendChild(btnGroup);
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

        // Hide the edit/delete buttons
        const btnGroup = document.querySelector('.card-header .btn-group');
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
}

.card {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.accordion-button:not(.collapsed) {
    background-color: var(--bs-primary);
    color: white;
}

.accordion-button:focus {
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.badge {
    font-weight: 500;
}

@media (max-width: 768px) {
    .user-actions {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
@endpush

@endsection
