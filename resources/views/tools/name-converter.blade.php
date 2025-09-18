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
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Single Name Conversion</h5>
                                </div>
                                <div class="card-body">
                                    <form id="singleConversionForm">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Enter Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name in English" required>
                                            <div id="nameError" class="invalid-feedback">
                                                Please enter a name to convert.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label d-block">Conversion Type</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conversionType" id="typeFull" value="full" checked>
                                                <label class="form-check-label" for="typeFull">English to Sinhala (Full)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conversionType" id="typeInitials" value="initials">
                                                <label class="form-check-label" for="typeInitials">English to Sinhala (Initials + Last Name)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conversionType" id="typeEnglishInitials" value="englishInitials">
                                                <label class="form-check-label" for="typeEnglishInitials">English Initials to Sinhala Initials</label>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">Convert</button>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="debugMode">
                                            <label class="form-check-label small text-muted" for="debugMode">
                                                Debug Mode (Show technical details)
                                            </label>
                                        </div>
                                    </form>
                                    <div id="singleResult" class="mt-3" style="display: none;">
                                        <div class="card">
                                            <div class="card-header bg-light">
                                                <h6 class="mb-0">Result</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-2">
                                                    <strong>Original:</strong> <span id="originalName"></span>
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Converted:</strong>
                                                    <div class="d-flex align-items-center mt-2">
                                                        <div class="form-control bg-light" id="convertedNameContainer">
                                                            <span id="convertedName"></span>
                                                        </div>
                                                        <button class="btn btn-primary ms-2" id="copyBtn" title="Copy to clipboard">
                                                            <i class="far fa-copy"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="text-success d-none" id="copySuccess">
                                                        <i class="fas fa-check"></i> Copied to clipboard!
                                                    </span>
                                                </div>
                                                <div class="mt-3" id="debugSection" style="display: none;">
                                                    <div class="alert alert-info">
                                                        <strong>Debug Info:</strong>
                                                        <pre id="debugInfo" class="mt-2"></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Bulk Conversion (Excel)</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('name-converter.bulk') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Upload Excel File</label>
                                            <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls, .csv" required>
                                            <div class="form-text">
                                                File must be an Excel spreadsheet with names in the first column.
                                            </div>
                                            <div class="mt-2">
                                                <a href="{{ asset('downloads/name_converter_template.xlsx') }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-download me-1"></i> Download Template
                                                </a>
                                                <span class="ms-2 text-muted small">First, download this template and add your names</span>
                                            </div>
                                            @error('file')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label d-block">Conversion Type</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conversionType" id="bulkTypeFull" value="full" checked>
                                                <label class="form-check-label" for="bulkTypeFull">English to Sinhala (Full)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conversionType" id="bulkTypeInitials" value="initials">
                                                <label class="form-check-label" for="bulkTypeInitials">English to Sinhala (Initials + Last Name)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conversionType" id="bulkTypeEnglishInitials" value="englishInitials">
                                                <label class="form-check-label" for="bulkTypeEnglishInitials">English Initials to Sinhala Initials</label>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">Convert & Download</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">How It Works</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h6>1. English to Sinhala (Full)</h6>
                                        <p>Converts each English name to its Sinhala equivalent.</p>
                                        <div class="alert alert-light">
                                            Example: <strong>John Smith</strong> → <strong>ජෝන් ස්මිත්</strong>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6>2. English to Sinhala (Initials + Last Name)</h6>
                                        <p>Converts English full name to Sinhala initials followed by the last name.</p>
                                        <div class="alert alert-light">
                                            Example: <strong>John Adam Smith</strong> → <strong>ජේ. ඒ. ස්මිත්</strong>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6>3. English Initials to Sinhala Initials</h6>
                                        <p>Converts English initials with Sinhala last name to full Sinhala format.</p>
                                        <div class="alert alert-light">
                                            Example: <strong>J.A. ස්මිත්</strong> → <strong>ජේ.ඒ. ස්මිත්</strong>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h6>Bulk Conversion Instructions:</h6>
                                        <ol class="mt-2">
                                            <li>Download the Excel template using the "Download Template" button</li>
                                            <li>Open the template in Microsoft Excel or similar spreadsheet software</li>
                                            <li>Enter names in the first column (column A) below the example rows</li>
                                            <li>Leave the second column (B) empty - it will be filled after conversion</li>
                                            <li>Save the file without changing its format (.xlsx)</li>
                                            <li>Upload your file and choose the conversion type</li>
                                            <li>Click "Convert & Download" to get your converted names</li>
                                        </ol>
                                        <div class="alert alert-info mt-3">
                                            <i class="fas fa-info-circle me-2"></i>
                                            <strong>Tip:</strong> For best results, use our template exactly as provided. Enter names starting from row 8 (below the examples) in column A.
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
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle single name conversion
        const singleForm = document.getElementById('singleConversionForm');
        const singleResult = document.getElementById('singleResult');
        const originalNameEl = document.getElementById('originalName');
        const convertedNameEl = document.getElementById('convertedName');
        const debugModeCheckbox = document.getElementById('debugMode');
        const debugSection = document.getElementById('debugSection');

        singleForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const nameInput = document.getElementById('name');
            const name = nameInput.value.trim();
            const nameError = document.getElementById('nameError');

            // Validate input
            if (name === '') {
                nameInput.classList.add('is-invalid');
                return;
            } else {
                nameInput.classList.remove('is-invalid');
            }

            const conversionType = document.querySelector('input[name="conversionType"]:checked').value;

            // Show loading state
            const submitBtn = singleForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Converting...';
            submitBtn.disabled = true;

            // Send AJAX request
            fetch('{{ route("name-converter.single") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ name, conversionType })
            })
            .then(response => {
                // Show debug info if debug mode is enabled
                const debugInfo = document.getElementById('debugInfo');
                debugSection.style.display = debugModeCheckbox.checked ? 'block' : 'none';

                // Add response status to debug
                debugInfo.textContent = `Response Status: ${response.status} ${response.statusText}\n`;

                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                // Add response data to debug
                const debugInfo = document.getElementById('debugInfo');
                debugInfo.textContent += `Response Data: ${JSON.stringify(data, null, 2)}\n`;

                // Display result
                originalNameEl.textContent = data.original;
                convertedNameEl.textContent = data.converted;
                singleResult.style.display = 'block';

                // Reset form state
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
            })
            .catch(error => {
                console.error('Error:', error);

                // Add error to debug info
                const debugInfo = document.getElementById('debugInfo');
                debugInfo.textContent += `Error: ${error.message}\n`;

                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while converting the name: ' + error.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });

                // Reset form state
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
            });
        });

        // Handle clipboard copy functionality
        const copyBtn = document.getElementById('copyBtn');
        const copySuccess = document.getElementById('copySuccess');

        if (copyBtn) {
            copyBtn.addEventListener('click', function() {
                const textToCopy = document.getElementById('convertedName').textContent;

                // Use the modern clipboard API if available
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(textToCopy)
                        .then(() => {
                            // Show success message
                            copySuccess.classList.remove('d-none');
                            setTimeout(() => {
                                copySuccess.classList.add('d-none');
                            }, 2000);
                        })
                        .catch(err => {
                            console.error('Could not copy text: ', err);
                            Swal.fire({
                                title: 'Clipboard Error',
                                text: 'Could not copy to clipboard: ' + err.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                } else {
                    // Fallback for older browsers
                    try {
                        const textarea = document.createElement('textarea');
                        textarea.value = textToCopy;
                        textarea.setAttribute('readonly', '');
                        textarea.style.position = 'absolute';
                        textarea.style.left = '-9999px';
                        document.body.appendChild(textarea);

                        textarea.select();
                        const successful = document.execCommand('copy');
                        document.body.removeChild(textarea);

                        if (successful) {
                            // Show success message
                            copySuccess.classList.remove('d-none');
                            setTimeout(() => {
                                copySuccess.classList.add('d-none');
                            }, 2000);
                        } else {
                            throw new Error('Copy command was unsuccessful');
                        }
                    } catch (err) {
                        console.error('Could not copy text: ', err);
                        Swal.fire({
                            title: 'Clipboard Error',
                            text: 'Could not copy to clipboard: ' + err.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        }        // Handle bulk conversion form validation
        const bulkForm = document.querySelector('form[action="{{ route("name-converter.bulk") }}"]');
        bulkForm.addEventListener('submit', function(e) {
            const fileInput = document.getElementById('file');
            if (!fileInput.files || fileInput.files.length === 0) {
                e.preventDefault();
                Swal.fire({
                    title: 'File Required',
                    text: 'Please select an Excel file to upload.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            }
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
