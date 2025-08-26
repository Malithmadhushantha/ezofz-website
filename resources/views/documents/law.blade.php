@extends('layouts.app')

@section('title', 'Law Documents - EZofz.lk')
@section('description', 'Browse and download official law documents from EZofz.lk.')
@section('keywords', 'law documents, downloads, Sri Lanka, legal, forms')

@section('content')
<div class="container py-4">
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

    <h2 class="mb-4"><i class="bi bi-file-text me-2"></i>Law Documents</h2>
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('documents.law') }}">Law Documents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('documents.police') }}">Police Documents</a>
        </li>
    </ul>
    @if($documents->count())
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Uploaded</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->description ?: 'No description' }}</td>
                            <td>{{ $document->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('documents.download', $document) }}" class="btn btn-sm btn-primary" title="Download">
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $documents->links() }}
        </div>
    @else
        <div class="alert alert-info">
            No law documents available at this time.
        </div>
    @endif

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
