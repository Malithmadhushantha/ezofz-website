@extends('layouts.app')

@section('title', 'Downloads - EZofz.lk')
@section('description', 'Browse and download official law and police documents, forms, and templates from EZofz.lk.')
@section('keywords', 'downloads, law documents, police documents, Sri Lanka, forms, templates')

@section('content')
<div class="container py-5">
    <!-- Adsense Ad (top) -->
    <div class="mb-4 text-center">
        {{-- Adsense ad slot --}}
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-xxxxxxxxxxxxxxxx"
             data-ad-slot="xxxxxxxxxx"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <div class="row g-4 mb-5">
        @php
            $categories = \App\Models\Category::orderBy('name')->take(4)->get();
        @endphp
        @foreach($categories as $category)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm text-center border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3">
                            @if($category->name === 'law')
                                <i class="bi bi-file-text display-4 text-warning"></i>
                            @elseif($category->name === 'police')
                                <i class="bi bi-shield display-4 text-info"></i>
                            @else
                                <i class="bi bi-folder display-4 text-primary"></i>
                            @endif
                        </div>
                        <h5 class="card-title mb-2">{{ ucfirst($category->name) }}</h5>
                        <p class="text-muted mb-3">{{ $category->documents()->count() }} documents</p>
                        @if($category->name === 'law')
                            <a href="{{ route('documents.law') }}" class="btn btn-warning w-100">View Law Documents</a>
                        @elseif($category->name === 'police')
                            <a href="{{ route('documents.police') }}" class="btn btn-info w-100 text-white">View Police Documents</a>
                        @else
                            <a href="{{ route('documents.category', $category->id) }}" class="btn btn-primary w-100">View Documents</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center py-5">
        <h4 class="mb-3">Select a category to browse documents</h4>
        <p class="text-muted">Choose from Law Documents, Police Documents, or other categories to view and download files.</p>
    </div>

    <!-- Adsense Ad (bottom) -->
    <div class="mt-4 text-center">
        {{-- Adsense ad slot --}}
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-xxxxxxxxxxxxxxxx"
             data-ad-slot="xxxxxxxxxx"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
@endsection
