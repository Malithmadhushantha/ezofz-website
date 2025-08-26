@extends('layouts.app')

@section('title', $category->name . ' Documents - EZofz.lk')
@section('description', 'Browse and download documents for the ' . $category->name . ' category from EZofz.lk.')
@section('keywords', $category->name . ' documents, downloads, Sri Lanka, forms')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"><i class="bi bi-folder2-open me-2"></i>{{ ucfirst($category->name) }} Documents</h2>
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
            No documents available in this category at this time.
        </div>
    @endif
</div>
@endsection
