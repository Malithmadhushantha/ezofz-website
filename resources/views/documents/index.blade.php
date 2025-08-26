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

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="bi bi-folder2-open me-2"></i>Downloads</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-4" id="docTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request()->routeIs('documents.law') ? 'active' : '' }}"
                       href="{{ route('documents.law') }}" role="tab">
                        <i class="bi bi-file-text me-1"></i>Law Documents
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ request()->routeIs('documents.police') ? 'active' : '' }}"
                       href="{{ route('documents.police') }}" role="tab">
                        <i class="bi bi-shield me-1"></i>Police Documents
                    </a>
                </li>
            </ul>
            <div class="text-center py-5">
                <h4 class="mb-3">Select a category to browse documents</h4>
                <p class="text-muted">Choose from Law Documents or Police Documents to view and download files.</p>
            </div>
        </div>
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
