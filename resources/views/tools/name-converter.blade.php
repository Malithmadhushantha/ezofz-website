@extends('layouts.app')

@section('title', 'Sinhala Name Converter | EZofz.lk')
@section('description', 'Convert names between English and Sinhala with our free online tool. Convert full names, initials, and more.')
@section('keywords', 'name converter, sinhala converter, english to sinhala, name to initials, sri lanka, conversion tool')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Sinhala Name Converter</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Name Conversion (Excel/CSV)</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('name-converter.bulk') }}" method="POST" enctype="multipart/form-data" id="bulkConversionForm">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="file" class="form-label fw-bold">Upload Excel or CSV File</label>
                                            <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls, .csv" required>
                                            <div class="form-text">
                                                Upload an Excel file (.xlsx, .xls) or CSV file with names in the first column.
                                            </div>
                                            <div class="mt-3 d-flex align-items-center">
                                                <a href="{{ route('name-converter.download-template') }}" class="btn btn-outline-primary">
                                                    <i class="fas fa-download me-1"></i> Download Template
                                                </a>
                                                <span class="ms-3 text-muted">First, download this template and add your names</span>
                                            </div>
                                            @error('file')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-bold">Choose Conversion Type</label>
                                            <div class="row mt-2">
                                                <div class="col-md-4 mb-3">
                                                    <input type="radio" class="btn-check" name="conversionType" id="bulkTypeFull" value="full" checked autocomplete="off">
                                                    <label class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3" for="bulkTypeFull">
                                                        <i class="fas fa-language fa-2x mb-2"></i>
                                                        <span>Full Name</span>
                                                        <small class="text-muted mt-1">English to Sinhala</small>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <input type="radio" class="btn-check" name="conversionType" id="bulkTypeInitials" value="initials" autocomplete="off">
                                                    <label class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3" for="bulkTypeInitials">
                                                        <i class="fas fa-signature fa-2x mb-2"></i>
                                                        <span>Initials + Last Name</span>
                                                        <small class="text-muted mt-1">J.D. Perera → ජේ.ඩී. පෙරේරා</small>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <input type="radio" class="btn-check" name="conversionType" id="bulkTypeEnglishInitials" value="englishInitials" autocomplete="off">
                                                    <label class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3" for="bulkTypeEnglishInitials">
                                                        <i class="fas fa-font fa-2x mb-2"></i>
                                                        <span>English Initials</span>
                                                        <small class="text-muted mt-1">J.A. to Sinhala</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Conversion button and loading indicator -->
                                        <div class="d-grid gap-2 mt-4">
                                            <button type="submit" class="btn btn-primary btn-lg" id="convertBtn">
                                                <span class="normal-state">
                                                    <i class="fas fa-exchange-alt me-2"></i> Convert & Download
                                                </span>
                                                <span class="loading-state d-none">
                                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                                    Processing...
                                                </span>
                                            </button>
                                        </div>

                                        <!-- Progress indicator (hidden by default) -->
                                        <div class="mt-4 d-none" id="conversionProgress">
                                            <div class="text-center mb-3">
                                                <h5 class="mb-1">Converting Names</h5>
                                                <p class="text-muted mb-3">Please wait while we process your file...</p>
                                            </div>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                    id="progressBar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                                <small>Processing...</small>
                                                <small id="progressPercentage">0%</small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>How It Works</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Quick Instructions -->
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="bg-light p-3 rounded-3">
                                                <h5 class="border-bottom pb-2 mb-3">Quick Steps</h5>
                                                <div class="row">
                                                    <div class="col-md-3 mb-3 mb-md-0 text-center">
                                                        <div class="bg-white rounded-circle p-3 mx-auto mb-2" style="width: 60px; height: 60px;">
                                                            <i class="fas fa-download text-primary fa-2x"></i>
                                                        </div>
                                                        <h6>1. Download Template</h6>
                                                        <small>Get the Excel/CSV template</small>
                                                    </div>
                                                    <div class="col-md-3 mb-3 mb-md-0 text-center">
                                                        <div class="bg-white rounded-circle p-3 mx-auto mb-2" style="width: 60px; height: 60px;">
                                                            <i class="fas fa-edit text-primary fa-2x"></i>
                                                        </div>
                                                        <h6>2. Add Names</h6>
                                                        <small>Enter names in column A</small>
                                                    </div>
                                                    <div class="col-md-3 mb-3 mb-md-0 text-center">
                                                        <div class="bg-white rounded-circle p-3 mx-auto mb-2" style="width: 60px; height: 60px;">
                                                            <i class="fas fa-upload text-primary fa-2x"></i>
                                                        </div>
                                                        <h6>3. Upload File</h6>
                                                        <small>Select your filled template</small>
                                                    </div>
                                                    <div class="col-md-3 mb-3 mb-md-0 text-center">
                                                        <div class="bg-white rounded-circle p-3 mx-auto mb-2" style="width: 60px; height: 60px;">
                                                            <i class="fas fa-exchange-alt text-primary fa-2x"></i>
                                                        </div>
                                                        <h6>4. Convert</h6>
                                                        <small>Get your converted names</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Conversion Types Explanation -->
                                    <h5 class="border-bottom pb-2 mb-3">Conversion Types</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-4 mb-3">
                                            <div class="card h-100 border-primary">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-0">English to Sinhala (Full)</h6>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Converts each English name to its Sinhala equivalent.</p>
                                                    <div class="alert alert-light border">
                                                        Example: <strong>John Smith</strong> → <strong>ජෝන් ස්මිත්</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="card h-100 border-primary">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-0">Initials + Last Name</h6>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Converts English full name to Sinhala initials followed by the last name.</p>
                                                    <div class="alert alert-light border">
                                                        Example: <strong>John Adam Smith</strong> → <strong>ජේ. ඒ. ස්මිත්</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="card h-100 border-primary">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-0">English Initials to Sinhala</h6>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Converts English initials with Sinhala last name to full Sinhala format.</p>
                                                    <div class="alert alert-light border">
                                                        Example: <strong>J.A. ස්මිත්</strong> → <strong>ජේ.ඒ. ස්මිත්</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Detailed Instructions -->
                                    <div class="mt-4">
                                        <h5 class="border-bottom pb-2 mb-3">Detailed Instructions</h5>
                                        <ol class="mt-2">
                                            <li>Download the Excel template using the "Download Template" button</li>
                                            <li>Open the template in Microsoft Excel or similar spreadsheet software</li>
                                            <li>Enter names in the first column (column A) starting from row 2 (below the headers)</li>
                                            <li>Leave the second column (B) empty - it will be filled after conversion</li>
                                            <li>Save the file in Excel format (.xlsx) or CSV format</li>
                                            <li>Upload your file and choose the conversion type</li>
                                            <li>Click "Convert & Download" to get your converted names</li>
                                        </ol>
                                        <div class="alert alert-info mt-3">
                                            <i class="fas fa-info-circle me-2"></i>
                                            <strong>Tip:</strong> For best results, use our template exactly as provided. Enter names starting from row 2 (below the headers) in column A.
                                        </div>
                                        <div class="alert alert-success mt-3">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <strong>File Support:</strong> Upload CSV files for reliable processing. Excel support depends on server configuration.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .btn-check + label {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .btn-check:checked + label {
        background-color: #e7f1ff;
        border-color: #0d6efd;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-check + label:hover {
        transform: translateY(-2px);
    }

    .progress-bar {
        transition: width 0.5s ease;
    }

    .loading-state, .normal-state {
        transition: opacity 0.3s ease;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    /* File input styling */
    .form-control[type="file"] {
        padding: 0.75rem;
    }

    .form-control[type="file"]::file-selector-button {
        background-color: #f8f9fa;
        color: #212529;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.375rem 0.75rem;
        margin-right: 1rem;
        transition: background-color 0.15s ease-in-out;
    }

    .form-control[type="file"]::file-selector-button:hover {
        background-color: #e9ecef;
    }

    /* Icon styling in cards */
    .bg-white.rounded-circle {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .bg-white.rounded-circle:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle bulk conversion form
        const bulkForm = document.getElementById('bulkConversionForm');
        const convertBtn = document.getElementById('convertBtn');
        const normalState = convertBtn.querySelector('.normal-state');
        const loadingState = convertBtn.querySelector('.loading-state');
        const progressSection = document.getElementById('conversionProgress');
        const progressBar = document.getElementById('progressBar');
        const progressPercentage = document.getElementById('progressPercentage');

        // Style the selected conversion type button
        const conversionTypeButtons = document.querySelectorAll('.btn-check');
        conversionTypeButtons.forEach(btn => {
            btn.addEventListener('change', function() {
                // Update active button styling if needed
            });
        });

        // Handle form submission and show loading state
        bulkForm.addEventListener('submit', function(e) {
            const fileInput = document.getElementById('file');

            // Check if file is selected
            if (!fileInput.files || fileInput.files.length === 0) {
                e.preventDefault();
                Swal.fire({
                    title: 'File Required',
                    text: 'Please select an Excel or CSV file to upload.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Show loading state
            normalState.classList.add('d-none');
            loadingState.classList.remove('d-none');
            convertBtn.disabled = true;
            progressSection.classList.remove('d-none');

            // Simulate progress (since we can't track actual server-side progress)
            let progress = 0;
            const progressInterval = setInterval(() => {
                // Increment progress more slowly at the beginning and end
                if (progress < 90) {
                    progress += Math.floor(Math.random() * 5) + 1;
                    if (progress > 90) {
                        progress = 90;
                    }

                    // Update progress bar
                    progressBar.style.width = `${progress}%`;
                    progressBar.setAttribute('aria-valuenow', progress);
                    progressBar.textContent = `${progress}%`;
                    progressPercentage.textContent = `${progress}%`;
                }
            }, 200);

            // Store interval ID in form data to be cleared later
            bulkForm.dataset.progressInterval = progressInterval;
        });

        // Handle file input change to reset loading state
        document.getElementById('file').addEventListener('change', function() {
            // Reset any previous loading state
            normalState.classList.remove('d-none');
            loadingState.classList.add('d-none');
            convertBtn.disabled = false;
            progressSection.classList.add('d-none');

            // Clear any existing interval
            if (bulkForm.dataset.progressInterval) {
                clearInterval(parseInt(bulkForm.dataset.progressInterval));
            }
        });

        // Make buttons with radio inputs more interactive
        document.querySelectorAll('.btn-check + label').forEach(label => {
            label.addEventListener('mouseover', function() {
                this.classList.add('shadow-sm');
            });

            label.addEventListener('mouseout', function() {
                this.classList.remove('shadow-sm');
            });
        });

        // Flash messages
        @if(session('error'))
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('success'))
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
@endsection
