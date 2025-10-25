@extends('admin.layouts.admin')

@section('title', 'Section Amendments - Admin Dashboard')
@section('page-title', 'Section {{ $section->section_number }} Amendments')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <div class="d-flex gap-2">
            <a href="{{ route('admin.penal-code.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back to Sections
            </a>
            <a href="{{ route('admin.penal-code.amendments.create', $section) }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Add Amendment
            </a>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Section Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <strong>Chapter:</strong> {{ $section->chapter_name }}<br>
                @if($section->sub_chapter_name)
                    <strong>Sub Chapter:</strong> {{ $section->sub_chapter_name }}<br>
                @endif
                <strong>Section Number:</strong> {{ $section->section_number }}{{ $section->sub_section_number ? '.' . $section->sub_section_number : '' }}
            </div>
            <div class="col-md-6">
                <strong>Section Name:</strong> {{ $section->name_of_the_section }}
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Amendments ({{ $amendments->count() }})</h5>
    </div>
    <div class="card-body">
        @if($amendments->count() > 0)
            @foreach($amendments as $amendment)
                <div class="card mb-3 border-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="card-title">Amendment {{ $amendment->amendment_number }}</h6>
                            <span class="text-muted">{{ $amendment->amendment_date->format('F d, Y') }}</span>
                        </div>
                        <p class="card-text">{{ $amendment->amendment_content }}</p>

                        @if($amendment->illustrations_1 || $amendment->illustrations_2 || $amendment->illustrations_3)
                            <div class="mt-3">
                                <strong>Illustrations:</strong>
                                @if($amendment->illustrations_1)
                                    <p class="small"><strong>1.</strong> {{ $amendment->illustrations_1 }}</p>
                                @endif
                                @if($amendment->illustrations_2)
                                    <p class="small"><strong>2.</strong> {{ $amendment->illustrations_2 }}</p>
                                @endif
                                @if($amendment->illustrations_3)
                                    <p class="small"><strong>3.</strong> {{ $amendment->illustrations_3 }}</p>
                                @endif
                            </div>
                        @endif

                        @if($amendment->explanation_1 || $amendment->explanation_2 || $amendment->explanation_3)
                            <div class="mt-3">
                                <strong>Explanations:</strong>
                                @if($amendment->explanation_1)
                                    <p class="small"><strong>1.</strong> {{ $amendment->explanation_1 }}</p>
                                @endif
                                @if($amendment->explanation_2)
                                    <p class="small"><strong>2.</strong> {{ $amendment->explanation_2 }}</p>
                                @endif
                                @if($amendment->explanation_3)
                                    <p class="small"><strong>3.</strong> {{ $amendment->explanation_3 }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-4">
                <i class="bi bi-file-earmark-text fs-1 text-muted"></i>
                <p class="mt-2 text-muted">No amendments found for this section</p>
                <a href="{{ route('admin.penal-code.amendments.create', $section) }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>Add First Amendment
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
