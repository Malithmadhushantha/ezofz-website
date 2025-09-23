@extends('layouts.app')

@section('title', 'Sri Lankan ID Card Details & Converter - EZofz.lk')
@section('description', 'Extract details from Sri Lankan National Identity Cards (NIC). Convert between old and new ID formats, view birth date, gender, age details with our advanced ID card analyzer tool.')

@push('meta')
<meta name="keywords" content="Sri Lanka ID card, NIC details, ID converter, national identity card, birth date extractor, age calculator, old to new ID, new to old ID, Sri Lankan NIC">
<meta name="author" content="EZofz.lk">
<meta property="og:title" content="Sri Lankan ID Card Details & Converter - EZofz.lk">
<meta property="og:description" content="Advanced tool to extract details from Sri Lankan National Identity Cards and convert between old and new formats">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Sri Lankan ID Card Details & Converter">
<meta name="twitter:description" content="Extract birth date, gender, age from Sri Lankan ID cards and convert between formats">
<link rel="canonical" href="{{ url()->current() }}">
@endpush

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --error-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        --dark-bg: #0a0e1a;
        --card-bg: rgba(255, 255, 255, 0.95);
        --glass-bg: rgba(255, 255, 255, 0.1);
        --text-light: #8892b0;
        --border-color: rgba(255, 255, 255, 0.2);
        --neon-blue: #00d4ff;
        --neon-purple: #b794f6;
        --neon-green: #48bb78;
    }

    * {
        cursor: none;
    }

    body {
        background: var(--dark-bg);
        color: white;
        position: relative;
        overflow-x: hidden;
    }

    /* Custom Cursor */
    .cursor {
        width: 20px;
        height: 20px;
        border: 2px solid var(--neon-blue);
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 9999;
        transition: all 0.1s ease;
        mix-blend-mode: difference;
    }

    .cursor::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 4px;
        height: 4px;
        background: var(--neon-blue);
        border-radius: 50%;
        transition: all 0.1s ease;
    }

    .cursor.active {
        transform: scale(2);
        border-color: var(--neon-purple);
    }

    .cursor.active::before {
        background: var(--neon-purple);
    }

    /* Animated Background */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 50%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(183, 148, 246, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(102, 126, 234, 0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
        animation: float-bg 20s ease-in-out infinite;
    }

    @keyframes float-bg {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(20px, -20px) rotate(1deg); }
        66% { transform: translate(-10px, 10px) rotate(-1deg); }
    }

    /* Header Section */
    .hero-section {
        padding: 120px 0 80px;
        position: relative;
        background: var(--primary-gradient);
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .glitch-text {
        font-size: 3.5rem;
        font-weight: 800;
        text-transform: uppercase;
        position: relative;
        color: white;
        letter-spacing: 3px;
    }

    .glitch-text::before,
    .glitch-text::after {
        content: attr(data-text);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        animation: glitch 2s infinite;
    }

    .glitch-text::before {
        color: #ff0040;
        z-index: -1;
        animation-delay: -0.3s;
    }

    .glitch-text::after {
        color: #00ff40;
        z-index: -2;
        animation-delay: -0.6s;
    }

    @keyframes glitch {
        0%, 100% { transform: translate(0); }
        10% { transform: translate(-2px, -1px); }
        20% { transform: translate(2px, 1px); }
        30% { transform: translate(-1px, 2px); }
        40% { transform: translate(1px, -2px); }
        50% { transform: translate(-2px, 1px); }
        60% { transform: translate(2px, -1px); }
        70% { transform: translate(-1px, -2px); }
        80% { transform: translate(1px, 2px); }
        90% { transform: translate(-2px, -1px); }
    }

    /* Tool Cards */
    .tool-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border-color);
        border-radius: 25px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.5s ease;
    }

    .tool-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transition: transform 1s ease;
    }

    .tool-card:hover::before {
        transform: scaleX(1);
    }

    .tool-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        border-color: var(--neon-blue);
    }

    /* Form Elements */
    .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 15px;
        padding: 15px 20px;
        color: white;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        font-size: 1.1rem;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--neon-blue);
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        color: white;
        outline: none;
    }

    .form-control::placeholder {
        color: var(--text-light);
    }

    .form-label {
        color: white;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    /* Buttons */
    .tech-btn {
        background: var(--primary-gradient);
        border: none;
        border-radius: 15px;
        padding: 15px 30px;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 1rem;
    }

    .tech-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tech-btn:hover::before {
        left: 100%;
    }

    .tech-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }

    .tech-btn:active {
        transform: translateY(-1px);
    }

    /* Copy Button */
    .copy-btn {
        background: var(--success-gradient);
        border: none;
        border-radius: 10px;
        padding: 8px 12px;
        color: white;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .copy-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(72, 187, 120, 0.4);
    }

    .copy-btn.copied {
        background: var(--warning-gradient);
        animation: pulse-success 0.6s ease;
    }

    @keyframes pulse-success {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    /* Results Section */
    .results-container {
        display: none;
        animation: slideInUp 0.8s ease-out;
    }

    .results-container.show {
        display: block;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .result-item {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        position: relative;
        transition: all 0.3s ease;
    }

    .result-item:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--neon-blue);
        transform: translateX(5px);
    }

    .result-label {
        color: var(--text-light);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .result-value {
        color: white;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .result-description {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    /* Converter Section */
    .converter-section {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem;
        margin-top: 1rem;
    }

    .format-selector {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        justify-content: center;
    }

    .format-option {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        padding: 10px 20px;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .format-option.active {
        background: var(--primary-gradient);
        border-color: var(--neon-blue);
        box-shadow: 0 5px 15px rgba(0, 212, 255, 0.3);
    }

    .format-option:hover {
        border-color: var(--neon-blue);
        transform: translateY(-2px);
    }

    /* Error Messages */
    .error-message {
        background: var(--error-gradient);
        border-radius: 10px;
        padding: 1rem;
        color: white;
        margin-top: 1rem;
        display: none;
        animation: slideInUp 0.5s ease;
    }

    .error-message.show {
        display: block;
    }

    /* Loading Animation */
    .loading {
        display: none;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .loading.show {
        display: flex;
    }

    .loading-spinner {
        width: 20px;
        height: 20px;
        border: 2px solid var(--border-color);
        border-top: 2px solid var(--neon-blue);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .glitch-text {
            font-size: 2.5rem;
            letter-spacing: 1px;
        }

        .tool-card {
            padding: 1.5rem;
        }

        .format-selector {
            flex-direction: column;
            align-items: center;
        }

        .format-option {
            width: 100%;
            text-align: center;
        }
    }

    /* Icon Animations */
    .icon-pulse {
        animation: icon-pulse 2s ease-in-out infinite;
    }

    @keyframes icon-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* Success Animation */
    .success-flash {
        animation: success-flash 0.6s ease;
    }

    @keyframes success-flash {
        0% { background-color: transparent; }
        50% { background-color: rgba(72, 187, 120, 0.2); }
        100% { background-color: transparent; }
    }

    /* Bulk Converter Styles */
    .file-upload-area {
        background: rgba(255, 255, 255, 0.05);
        border: 2px dashed var(--border-color);
        border-radius: 20px;
        padding: 3rem 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .file-upload-area:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--neon-blue);
        transform: translateY(-2px);
    }

    .file-upload-area.dragover {
        background: rgba(0, 212, 255, 0.1);
        border-color: var(--neon-blue);
        border-style: solid;
    }

    .file-upload-content h5 {
        color: white;
        font-weight: 600;
    }

    .file-selected-info {
        background: rgba(72, 187, 120, 0.1);
        border: 1px solid rgba(72, 187, 120, 0.3);
        border-radius: 15px;
        padding: 1.5rem;
    }

    .processing-status {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 15px;
        padding: 2rem;
        margin-top: 2rem;
    }

    .progress-container {
        max-width: 400px;
        margin: 0 auto;
    }

    .progress-bar {
        transition: width 0.5s ease;
        border-radius: 5px;
    }

    .upload-section {
        position: relative;
    }

    .upload-section.processing {
        pointer-events: none;
        opacity: 0.7;
    }

    /* File type indicators */
    .file-type-excel {
        color: #28a745;
    }

    .file-type-csv {
        color: #ffc107;
    }

    /* Column selection dropdown */
    #columnSelectionContainer {
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            max-height: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            max-height: 200px;
            transform: translateY(0);
        }
    }

    /* Bulk results animations */
    .bulk-result-item {
        animation: fadeInUp 0.5s ease;
    }

    .bulk-result-item:nth-child(2) {
        animation-delay: 0.1s;
    }

    .bulk-result-item:nth-child(3) {
        animation-delay: 0.2s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Progress text animations */
    .progress-text-glow {
        animation: textGlow 2s ease-in-out infinite;
    }

    @keyframes textGlow {
        0%, 100% { text-shadow: 0 0 5px rgba(0, 212, 255, 0.5); }
        50% { text-shadow: 0 0 15px rgba(0, 212, 255, 0.8); }
    }

    /* Download button special styling */
    #downloadResultBtn {
        background: var(--success-gradient);
        position: relative;
        overflow: hidden;
    }

    #downloadResultBtn::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: downloadShine 2s ease-in-out infinite;
    }

    @keyframes downloadShine {
        0% { left: -100%; }
        50%, 100% { left: 100%; }
    }

    /* Mobile responsiveness for bulk converter */
    @media (max-width: 768px) {
        .file-upload-area {
            padding: 2rem 1rem;
        }

        .format-selector {
            gap: 0.5rem;
        }

        .format-option {
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .progress-container {
            max-width: 100%;
        }
    }
</style>
@endpush

@section('content')
<!-- Custom Cursor -->
<div class="cursor"></div>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="glitch-text" data-text="ID ANALYZER" data-aos="fade-down">ID ANALYZER</h1>
            <p class="lead mt-4" data-aos="fade-up" data-aos-delay="200">
                Sri Lankan National Identity Card • Details Extractor & Format Converter
            </p>
            <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                <span class="badge bg-gradient px-3 py-2 me-2" style="background: var(--success-gradient);">
                    <i class="bi bi-shield-check me-2"></i>Secure Processing
                </span>
                <span class="badge bg-gradient px-3 py-2 me-2" style="background: var(--warning-gradient);">
                    <i class="bi bi-lightning me-2"></i>Instant Results
                </span>
                <span class="badge bg-gradient px-3 py-2" style="background: var(--secondary-gradient);">
                    <i class="bi bi-arrow-repeat me-2"></i>Format Converter
                </span>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <!-- ID Details Extractor -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="tool-card" data-aos="fade-up">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-3">
                        <i class="bi bi-person-badge icon-pulse me-2" style="color: var(--neon-blue);"></i>
                        ID Card Details Extractor
                    </h2>
                    <p class="text-light">
                        Enter any Sri Lankan National Identity Card number to extract birth date, gender, and age details
                    </p>
                </div>

                <form id="idDetailsForm">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="idNumber" class="form-label">
                                <i class="bi bi-credit-card-2-front me-2"></i>National Identity Card Number
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="idNumber"
                                   placeholder="Enter ID number (e.g., 983211429V or 199832101429)"
                                   maxlength="12"
                                   autocomplete="off">
                            <small class="text-light mt-2 d-block">
                                <i class="bi bi-info-circle me-1"></i>
                                Supports both old format (983211429V) and new format (199832101429)
                            </small>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="tech-btn">
                                <i class="bi bi-search me-2"></i>Extract Details
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Loading Animation -->
                <div class="loading" id="detailsLoading">
                    <div class="loading-spinner"></div>
                    <span class="text-light">Processing ID number...</span>
                </div>

                <!-- Error Message -->
                <div class="error-message" id="detailsError">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <span id="detailsErrorText"></span>
                </div>

                <!-- Results Container -->
                <div class="results-container" id="detailsResults">
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="result-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="result-label">Date of Birth</div>
                                        <div class="result-value" id="birthDate">-</div>
                                        <div class="result-description">Full birth date extracted from ID</div>
                                    </div>
                                    <button class="copy-btn" onclick="copyToClipboard('birthDate', this)">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="result-label">Birth Date (ISO Format)</div>
                                        <div class="result-value" id="birthDateISO">-</div>
                                        <div class="result-description">YYYY-MM-DD format</div>
                                    </div>
                                    <button class="copy-btn" onclick="copyToClipboard('birthDateISO', this)">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="result-label">Gender</div>
                                        <div class="result-value" id="gender">-</div>
                                        <div class="result-description">Gender determined from ID number</div>
                                    </div>
                                    <button class="copy-btn" onclick="copyToClipboard('gender', this)">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="result-label">Exact Age</div>
                                        <div class="result-value" id="exactAge">-</div>
                                        <div class="result-description">Years, months, and days</div>
                                    </div>
                                    <button class="copy-btn" onclick="copyToClipboard('exactAge', this)">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="result-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="result-label">Age (Years)</div>
                                        <div class="result-value" id="ageYears">-</div>
                                        <div class="result-description">Years old</div>
                                    </div>
                                    <button class="copy-btn" onclick="copyToClipboard('ageYears', this)">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="result-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="result-label">Age (Months)</div>
                                        <div class="result-value" id="ageMonths">-</div>
                                        <div class="result-description">Total months</div>
                                    </div>
                                    <button class="copy-btn" onclick="copyToClipboard('ageMonths', this)">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="result-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="result-label">Age (Days)</div>
                                        <div class="result-value" id="ageDays">-</div>
                                        <div class="result-description">Total days lived</div>
                                    </div>
                                    <button class="copy-btn" onclick="copyToClipboard('ageDays', this)">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Format Converter -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="tool-card" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-3">
                        <i class="bi bi-arrow-repeat icon-pulse me-2" style="color: var(--neon-purple);"></i>
                        ID Format Converter
                    </h2>
                    <p class="text-light">
                        Convert between old and new Sri Lankan National Identity Card formats
                    </p>
                </div>

                <!-- Format Selection -->
                <div class="format-selector">
                    <div class="format-option active" data-format="old-to-new" onclick="selectFormat('old-to-new', this)">
                        <i class="bi bi-arrow-right me-2"></i>Old to New
                    </div>
                    <div class="format-option" data-format="new-to-old" onclick="selectFormat('new-to-old', this)">
                        <i class="bi bi-arrow-left me-2"></i>New to Old
                    </div>
                </div>

                <form id="converterForm">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="convertId" class="form-label">
                                <i class="bi bi-arrow-repeat me-2"></i>
                                <span id="inputLabel">Old Format ID Number (e.g., 983211429V)</span>
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="convertId"
                                   placeholder="Enter ID number to convert"
                                   maxlength="12"
                                   autocomplete="off">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="tech-btn">
                                <i class="bi bi-arrow-repeat me-2"></i>Convert Format
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Converter Loading -->
                <div class="loading" id="converterLoading">
                    <div class="loading-spinner"></div>
                    <span class="text-light">Converting format...</span>
                </div>

                <!-- Converter Error -->
                <div class="error-message" id="converterError">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <span id="converterErrorText"></span>
                </div>

                <!-- Converter Results -->
                <div class="results-container" id="converterResults">
                    <div class="converter-section mt-4">
                        <div class="text-center">
                            <div class="result-label mb-2">Converted Result</div>
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <div class="result-value" id="convertedId" style="font-size: 2rem;">-</div>
                                <button class="copy-btn" onclick="copyToClipboard('convertedId', this)" style="padding: 12px 16px;">
                                    <i class="bi bi-clipboard" style="font-size: 1.2rem;"></i>
                                </button>
                            </div>
                            <div class="result-description mt-2">
                                <span id="conversionDescription">Converted ID number</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Converter -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="tool-card" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-3">
                        <i class="bi bi-file-earmark-spreadsheet icon-pulse me-2" style="color: var(--neon-green);"></i>
                        Bulk ID Converter
                    </h2>
                    <p class="text-light">
                        Upload an Excel file with multiple ID numbers and convert them all at once
                    </p>
                </div>

                <!-- Bulk Format Selection -->
                <div class="format-selector">
                    <div class="format-option active" data-format="bulk-old-to-new" onclick="selectBulkFormat('bulk-old-to-new', this)">
                        <i class="bi bi-arrow-right me-2"></i>Old to New (Bulk)
                    </div>
                    <div class="format-option" data-format="bulk-new-to-old" onclick="selectBulkFormat('bulk-new-to-old', this)">
                        <i class="bi bi-arrow-left me-2"></i>New to Old (Bulk)
                    </div>
                </div>

                <!-- Upload Section -->
                <div class="upload-section">
                    <form id="bulkConverterForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="excelFile" class="form-label">
                                    <i class="bi bi-cloud-upload me-2"></i>
                                    <span id="bulkInputLabel">Upload Excel File with Old Format ID Numbers</span>
                                </label>
                                <div class="file-upload-area" id="fileUploadArea">
                                    <input type="file"
                                           class="form-control"
                                           id="excelFile"
                                           name="excel_file"
                                           accept=".xlsx,.xls,.csv"
                                           style="display: none;">
                                    <div class="file-upload-content">
                                        <i class="bi bi-cloud-upload-fill" style="font-size: 3rem; color: var(--neon-blue);"></i>
                                        <h5 class="mt-3 mb-2">Drop your Excel file here</h5>
                                        <p class="text-light mb-3">or click to browse</p>
                                        <button type="button" class="tech-btn" onclick="document.getElementById('excelFile').click()">
                                            <i class="bi bi-folder2-open me-2"></i>Choose File
                                        </button>
                                        <div class="mt-3">
                                            <small class="text-light">
                                                <i class="bi bi-info-circle me-1"></i>
                                                Supported formats: .xlsx, .xls, .csv
                                            </small>
                                        </div>
                                    </div>
                                    <div class="file-selected-info" style="display: none;">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-earmark-spreadsheet text-success me-2" style="font-size: 2rem;"></i>
                                                <div>
                                                    <div class="fw-bold" id="selectedFileName">-</div>
                                                    <small class="text-light" id="selectedFileSize">-</small>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-light btn-sm" onclick="clearSelectedFile()">
                                                <i class="bi bi-x"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Column Selection -->
                            <div class="col-12" id="columnSelectionContainer" style="display: none;">
                                <label class="form-label">
                                    <i class="bi bi-list-columns-reverse me-2"></i>
                                    Select Column Containing ID Numbers
                                </label>
                                <select class="form-control" id="columnSelect">
                                    <option value="">Choose column...</option>
                                </select>
                                <small class="text-light mt-2 d-block">
                                    <i class="bi bi-info-circle me-1"></i>
                                    We'll automatically detect columns from your Excel file
                                </small>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="tech-btn" id="bulkConvertBtn" disabled>
                                    <i class="bi bi-arrow-repeat me-2"></i>Convert All IDs
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Bulk Processing Status -->
                <div class="processing-status" id="bulkProcessingStatus" style="display: none;">
                    <div class="progress-container">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-light">Processing IDs...</span>
                            <span class="text-light" id="progressText">0%</span>
                        </div>
                        <div class="progress" style="height: 10px; background: rgba(255,255,255,0.1); border-radius: 5px;">
                            <div class="progress-bar" id="progressBar" style="background: var(--success-gradient);" role="progressbar"></div>
                        </div>
                        <div class="mt-3 text-center">
                            <div class="loading-spinner d-inline-block me-2"></div>
                            <span class="text-light" id="statusText">Analyzing Excel file...</span>
                        </div>
                    </div>
                </div>

                <!-- Bulk Results -->
                <div class="results-container" id="bulkResults">
                    <div class="converter-section mt-4">
                        <div class="text-center">
                            <div class="result-label mb-3">Conversion Complete!</div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="result-item">
                                        <div class="result-label">Total Processed</div>
                                        <div class="result-value" id="totalProcessed">0</div>
                                        <div class="result-description">ID numbers</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item">
                                        <div class="result-label">Successful</div>
                                        <div class="result-value text-success" id="successfulCount">0</div>
                                        <div class="result-description">Converted</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item">
                                        <div class="result-label">Failed</div>
                                        <div class="result-value text-danger" id="failedCount">0</div>
                                        <div class="result-description">Invalid IDs</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button class="tech-btn me-3" id="downloadResultBtn" onclick="downloadConvertedFile()">
                                    <i class="bi bi-download me-2"></i>Download Results
                                </button>
                                <button class="btn btn-outline-light" onclick="resetBulkConverter()">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Convert Another File
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bulk Error Messages -->
                <div class="error-message" id="bulkError">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <span id="bulkErrorText"></span>
                </div>

                <!-- Sample Template Download -->
                <div class="mt-4 p-3 rounded" style="background: rgba(255,255,255,0.05); border: 1px solid var(--border-color);">
                    <div class="text-center">
                        <h6 class="mb-3">
                            <i class="bi bi-download me-2"></i>
                            Need a template? Download sample Excel files
                        </h6>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="#" class="btn btn-outline-light btn-sm" onclick="downloadTemplate('old-format')">
                                <i class="bi bi-file-earmark-excel me-1"></i> Old Format Template
                            </a>
                            <a href="#" class="btn btn-outline-light btn-sm" onclick="downloadTemplate('new-format')">
                                <i class="bi bi-file-earmark-excel me-1"></i> New Format Template
                            </a>
                        </div>
                        <small class="text-light mt-2 d-block">
                            Templates are Excel files (.xlsx) with sample data and formatting instructions
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="tool-card" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center">
                    <h3 class="fw-bold mb-4">
                        <i class="bi bi-info-circle me-2" style="color: var(--neon-green);"></i>
                        About Sri Lankan ID Numbers
                    </h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="result-item text-start">
                                <h5 class="text-warning mb-3">Old Format (Before 2016)</h5>
                                <p class="text-light mb-2">
                                    <strong>Format:</strong> 9 digits + V/X
                                </p>
                                <p class="text-light mb-2">
                                    <strong>Example:</strong> 983211429V
                                </p>
                                <p class="text-light">
                                    The first 2 digits represent birth year, next 3 digits represent day of year,
                                    and the last 4 digits are serial numbers with gender coding.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="result-item text-start">
                                <h5 class="text-info mb-3">New Format (From 2016)</h5>
                                <p class="text-light mb-2">
                                    <strong>Format:</strong> 12 digits
                                </p>
                                <p class="text-light mb-2">
                                    <strong>Example:</strong> 199832101429
                                </p>
                                <p class="text-light">
                                    The first 4 digits represent birth year, next 3 digits represent day of year,
                                    and the last 5 digits are serial numbers with gender coding.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Custom Cursor
document.addEventListener('DOMContentLoaded', function() {
    const cursor = document.querySelector('.cursor');
    const links = document.querySelectorAll('a, button, .form-control, .format-option, .copy-btn');

    document.addEventListener('mousemove', e => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    });

    links.forEach(link => {
        link.addEventListener('mouseenter', () => {
            cursor.classList.add('active');
        });

        link.addEventListener('mouseleave', () => {
            cursor.classList.remove('active');
        });
    });
});

// Global Variables
let currentFormat = 'old-to-new';

// SR Lankan ID Number Parser
class SriLankanIDParser {
    constructor() {
        this.oldFormatRegex = /^([0-9]{9})[VvXx]$/;
        this.newFormatRegex = /^([0-9]{12})$/;
    }

    parseID(idNumber) {
        idNumber = idNumber.trim().toUpperCase();

        if (this.oldFormatRegex.test(idNumber)) {
            return this.parseOldFormat(idNumber);
        } else if (this.newFormatRegex.test(idNumber)) {
            return this.parseNewFormat(idNumber);
        } else {
            throw new Error('Invalid ID number format');
        }
    }

    parseOldFormat(idNumber) {
        const number = idNumber.slice(0, 9);
        const year = parseInt(number.slice(0, 2));
        const dayText = parseInt(number.slice(2, 5));

        // Determine full year
        const fullYear = year < 50 ? 2000 + year : 1900 + year;

        // Determine gender and adjust day count
        let gender, actualDayOfYear;
        if (dayText > 500) {
            gender = 'Female';
            actualDayOfYear = dayText - 500;
        } else {
            gender = 'Male';
            actualDayOfYear = dayText;
        }

        // Validate day range
        if (actualDayOfYear < 1 || actualDayOfYear > 366) {
            throw new Error('Invalid day of year in ID number');
        }

        // Calculate birth date using month-based approach
        const birthDate = this.calculateBirthDate(fullYear, actualDayOfYear);

        // Calculate age
        const age = this.calculateAge(birthDate);

        return {
            birthDate: birthDate,
            gender: gender,
            age: age,
            format: 'old'
        };
    }

    parseNewFormat(idNumber) {
        const year = parseInt(idNumber.slice(0, 4));
        const dayText = parseInt(idNumber.slice(4, 7));

        // Determine gender and adjust day count
        let gender, actualDayOfYear;
        if (dayText > 500) {
            gender = 'Female';
            actualDayOfYear = dayText - 500;
        } else {
            gender = 'Male';
            actualDayOfYear = dayText;
        }

        // Validate day range
        if (actualDayOfYear < 1 || actualDayOfYear > 366) {
            throw new Error('Invalid day of year in ID number');
        }

        // Calculate birth date using month-based approach
        const birthDate = this.calculateBirthDate(year, actualDayOfYear);

        // Calculate age
        const age = this.calculateAge(birthDate);

        return {
            birthDate: birthDate,
            gender: gender,
            age: age,
            format: 'new'
        };
    }

    calculateBirthDate(year, dayOfYear) {
        let month = "";
        let day = 0;

        // Determine month and day based on day of year (following the working HTML logic)
        if (dayOfYear > 335) {
            day = dayOfYear - 335;
            month = "December";
        }
        else if (dayOfYear > 305) {
            day = dayOfYear - 305;
            month = "November";
        }
        else if (dayOfYear > 274) {
            day = dayOfYear - 274;
            month = "October";
        }
        else if (dayOfYear > 244) {
            day = dayOfYear - 244;
            month = "September";
        }
        else if (dayOfYear > 213) {
            day = dayOfYear - 213;
            month = "August";
        }
        else if (dayOfYear > 182) {
            day = dayOfYear - 182;
            month = "July";
        }
        else if (dayOfYear > 152) {
            day = dayOfYear - 152;
            month = "June";
        }
        else if (dayOfYear > 121) {
            day = dayOfYear - 121;
            month = "May";
        }
        else if (dayOfYear > 91) {
            day = dayOfYear - 91;
            month = "April";
        }
        else if (dayOfYear > 60) {
            day = dayOfYear - 60;
            month = "March";
        }
        else if (dayOfYear > 31) {
            day = dayOfYear - 31;
            month = "February";
        }
        else if (dayOfYear < 32) {
            month = "January";
            day = dayOfYear;
        }

        // Convert month name to number
        const monthNumbers = {
            "January": 0, "February": 1, "March": 2, "April": 3,
            "May": 4, "June": 5, "July": 6, "August": 7,
            "September": 8, "October": 9, "November": 10, "December": 11
        };

        return new Date(year, monthNumbers[month], day);
    }

    dayOfYearToDate(year, dayOfYear) {
        // This method is now replaced by calculateBirthDate but kept for compatibility
        return this.calculateBirthDate(year, dayOfYear);
    }

    calculateAge(birthDate) {
        const today = new Date();
        const birth = new Date(birthDate);

        // Calculate total days lived
        const totalDays = Math.floor((today - birth) / (1000 * 60 * 60 * 24));

        // Calculate years using the working HTML method
        const yearsOld = Number(today.getTime() - birth.getTime()) / (365 * 24 * 3600 * 1000);
        const years = Math.trunc(yearsOld);

        // Calculate months and days more accurately
        let months = today.getMonth() - birth.getMonth();
        let days = today.getDate() - birth.getDate();

        // Adjust for negative days
        if (days < 0) {
            months--;
            // Get the last day of the previous month
            const lastMonth = new Date(today.getFullYear(), today.getMonth(), 0);
            days += lastMonth.getDate();
        }

        // Adjust for negative months
        if (months < 0) {
            months += 12;
        }

        const totalMonths = years * 12 + months;

        return {
            years: years,
            months: totalMonths,
            days: totalDays,
            exactAge: {
                years: years,
                months: months,
                days: days
            },
            detailed: `${years} years, ${months} months, ${days} days`
        };
    }

    convertOldToNew(oldId) {
        oldId = oldId.trim().toUpperCase();

        if (!this.oldFormatRegex.test(oldId)) {
            throw new Error('Invalid old format ID number');
        }

        const number = oldId.slice(0, 9);
        const year = parseInt(number.slice(0, 2));
        const dayOfYear = parseInt(number.slice(2, 5));
        const serialNumber = parseInt(number.slice(5, 9));

        // Determine full year
        const fullYear = year < 50 ? 2000 + year : 1900 + year;

        // Determine if female based on day of year (>500)
        const isFemale = dayOfYear > 500;

        // Convert day of year and serial number for new format
        let newDayOfYear, newSerialNumber;

        if (isFemale) {
            // For females: day of year stays >500, serial number gets +50000
            newDayOfYear = dayOfYear.toString().padStart(3, '0');
            newSerialNumber = (serialNumber + 50000).toString().padStart(5, '0');
        } else {
            // For males: day of year stays <500, serial number stays as is
            newDayOfYear = dayOfYear.toString().padStart(3, '0');
            newSerialNumber = serialNumber.toString().padStart(5, '0');
        }

        return fullYear.toString() + newDayOfYear + newSerialNumber;
    }

    convertNewToOld(newId) {
        newId = newId.trim();

        if (!this.newFormatRegex.test(newId)) {
            throw new Error('Invalid new format ID number');
        }

        const year = parseInt(newId.slice(0, 4));
        const dayOfYear = parseInt(newId.slice(4, 7));
        const serialNumber = parseInt(newId.slice(7, 12));

        // Convert year to 2 digits
        const shortYear = (year % 100).toString().padStart(2, '0');

        // Determine if female based on day of year (>500)
        const isFemale = dayOfYear > 500;

        // Convert day of year and serial number for old format
        let oldDayOfYear, oldSerialNumber;

        if (isFemale) {
            // For females: day of year stays >500, serial number gets -50000
            oldDayOfYear = dayOfYear.toString().padStart(3, '0');
            oldSerialNumber = (serialNumber - 50000).toString().padStart(4, '0');
        } else {
            // For males: day of year stays <500, serial number stays as is
            oldDayOfYear = dayOfYear.toString().padStart(3, '0');
            oldSerialNumber = serialNumber.toString().padStart(4, '0');
        }

        return shortYear + oldDayOfYear + oldSerialNumber + 'V';
    }
}

// Initialize Parser
const idParser = new SriLankanIDParser();

// Format Selection
function selectFormat(format, element) {
    currentFormat = format;

    // Update active state
    document.querySelectorAll('.format-option').forEach(opt => opt.classList.remove('active'));
    element.classList.add('active');

    // Update input label and placeholder
    const inputLabel = document.getElementById('inputLabel');
    const convertIdInput = document.getElementById('convertId');

    if (format === 'old-to-new') {
        inputLabel.textContent = 'Old Format ID Number (e.g., 983211429V)';
        convertIdInput.placeholder = 'Enter old format ID (e.g., 983211429V)';
        convertIdInput.maxLength = 10;
    } else {
        inputLabel.textContent = 'New Format ID Number (e.g., 199832101429)';
        convertIdInput.placeholder = 'Enter new format ID (e.g., 199832101429)';
        convertIdInput.maxLength = 12;
    }

    // Clear input and results
    convertIdInput.value = '';
    hideConverterResults();
}

// ID Details Form Handler
document.getElementById('idDetailsForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const idNumber = document.getElementById('idNumber').value.trim();

    if (!idNumber) {
        showDetailsError('Please enter an ID number');
        return;
    }

    showDetailsLoading();
    hideDetailsError();
    hideDetailsResults();

    // Simulate processing delay for better UX
    setTimeout(() => {
        try {
            const result = idParser.parseID(idNumber);
            displayDetailsResults(result);
            hideDetailsLoading();
        } catch (error) {
            hideDetailsLoading();
            showDetailsError(error.message);
        }
    }, 800);
});

// Converter Form Handler
document.getElementById('converterForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const idNumber = document.getElementById('convertId').value.trim();

    if (!idNumber) {
        showConverterError('Please enter an ID number to convert');
        return;
    }

    showConverterLoading();
    hideConverterError();
    hideConverterResults();

    // Simulate processing delay
    setTimeout(() => {
        try {
            let convertedId;
            let description;

            if (currentFormat === 'old-to-new') {
                convertedId = idParser.convertOldToNew(idNumber);
                description = `Converted from old format (${idNumber}) to new format`;
            } else {
                convertedId = idParser.convertNewToOld(idNumber);
                description = `Converted from new format (${idNumber}) to old format`;
            }

            displayConverterResults(convertedId, description);
            hideConverterLoading();
        } catch (error) {
            hideConverterLoading();
            showConverterError(error.message);
        }
    }, 600);
});

// Display Functions
function displayDetailsResults(result) {
    // Format birth date in readable format
    const birthDate = result.birthDate.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    });

    // Format birth date in ISO format (YYYY-MM-DD) without timezone conversion
    const year = result.birthDate.getFullYear();
    const month = String(result.birthDate.getMonth() + 1).padStart(2, '0');
    const day = String(result.birthDate.getDate()).padStart(2, '0');
    const birthDateISO = `${year}-${month}-${day}`;

    // Update all the display elements
    document.getElementById('birthDate').textContent = birthDate;
    document.getElementById('birthDateISO').textContent = birthDateISO;
    document.getElementById('gender').textContent = result.gender;
    document.getElementById('exactAge').textContent = result.age.detailed;
    document.getElementById('ageYears').textContent = result.age.years;
    document.getElementById('ageMonths').textContent = result.age.months;
    document.getElementById('ageDays').textContent = result.age.days.toLocaleString();

    showDetailsResults();
}

function displayConverterResults(convertedId, description) {
    document.getElementById('convertedId').textContent = convertedId;
    document.getElementById('conversionDescription').textContent = description;
    showConverterResults();
}

// Show/Hide Functions
function showDetailsLoading() {
    document.getElementById('detailsLoading').classList.add('show');
}

function hideDetailsLoading() {
    document.getElementById('detailsLoading').classList.remove('show');
}

function showDetailsError(message) {
    document.getElementById('detailsErrorText').textContent = message;
    document.getElementById('detailsError').classList.add('show');
}

function hideDetailsError() {
    document.getElementById('detailsError').classList.remove('show');
}

function showDetailsResults() {
    document.getElementById('detailsResults').classList.add('show');
}

function hideDetailsResults() {
    document.getElementById('detailsResults').classList.remove('show');
}

function showConverterLoading() {
    document.getElementById('converterLoading').classList.add('show');
}

function hideConverterLoading() {
    document.getElementById('converterLoading').classList.remove('show');
}

function showConverterError(message) {
    document.getElementById('converterErrorText').textContent = message;
    document.getElementById('converterError').classList.add('show');
}

function hideConverterError() {
    document.getElementById('converterError').classList.remove('show');
}

function showConverterResults() {
    document.getElementById('converterResults').classList.add('show');
}

function hideConverterResults() {
    document.getElementById('converterResults').classList.remove('show');
}

// Copy to Clipboard Function
function copyToClipboard(elementId, button) {
    const element = document.getElementById(elementId);
    const text = element.textContent;

    navigator.clipboard.writeText(text).then(() => {
        // Visual feedback
        const originalIcon = button.innerHTML;
        button.innerHTML = '<i class="bi bi-check"></i>';
        button.classList.add('copied');

        // Add success flash to parent result item
        const resultItem = button.closest('.result-item, .converter-section');
        if (resultItem) {
            resultItem.classList.add('success-flash');
            setTimeout(() => resultItem.classList.remove('success-flash'), 600);
        }

        // Reset after 2 seconds
        setTimeout(() => {
            button.innerHTML = originalIcon;
            button.classList.remove('copied');
        }, 2000);

        // Show toast notification
        showToast('Copied to clipboard!', 'success');
    }).catch(() => {
        showToast('Failed to copy to clipboard', 'error');
    });
}

// Toast Notification
function showToast(message, type = 'success') {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `toast-notification ${type}`;
    toast.innerHTML = `
        <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
        ${message}
    `;

    // Style the toast
    toast.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: ${type === 'success' ? 'var(--success-gradient)' : 'var(--error-gradient)'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        z-index: 10000;
        animation: slideInRight 0.3s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
    `;

    document.body.appendChild(toast);

    // Remove after 3 seconds
    setTimeout(() => {
        toast.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Add CSS for toast animations
const toastStyles = document.createElement('style');
toastStyles.textContent = `
    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideOutRight {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(toastStyles);

// Input formatting and validation
document.getElementById('idNumber').addEventListener('input', function(e) {
    let value = e.target.value.replace(/[^0-9VvXx]/g, '');
    e.target.value = value;
});

document.getElementById('convertId').addEventListener('input', function(e) {
    let value = e.target.value.replace(/[^0-9VvXx]/g, '');
    e.target.value = value;
});

// Bulk Converter Functionality
let currentBulkFormat = 'bulk-old-to-new';
let selectedFile = null;
let conversionResults = null;

// Bulk Format Selection
function selectBulkFormat(format, element) {
    currentBulkFormat = format;

    // Update active state
    document.querySelectorAll('.format-option').forEach(opt => {
        if (opt.getAttribute('data-format') && opt.getAttribute('data-format').startsWith('bulk-')) {
            opt.classList.remove('active');
        }
    });
    element.classList.add('active');

    // Update input label
    const bulkInputLabel = document.getElementById('bulkInputLabel');
    if (format === 'bulk-old-to-new') {
        bulkInputLabel.textContent = 'Upload Excel File with Old Format ID Numbers';
    } else {
        bulkInputLabel.textContent = 'Upload Excel File with New Format ID Numbers';
    }

    // Reset the form
    resetBulkConverter();
}

// File Upload Handling
const fileUploadArea = document.getElementById('fileUploadArea');
const fileInput = document.getElementById('excelFile');

// Click to upload
fileUploadArea.addEventListener('click', function(e) {
    if (e.target.tagName !== 'BUTTON') {
        fileInput.click();
    }
});

// Drag and drop functionality
fileUploadArea.addEventListener('dragover', function(e) {
    e.preventDefault();
    fileUploadArea.classList.add('dragover');
});

fileUploadArea.addEventListener('dragleave', function(e) {
    e.preventDefault();
    fileUploadArea.classList.remove('dragover');
});

fileUploadArea.addEventListener('drop', function(e) {
    e.preventDefault();
    fileUploadArea.classList.remove('dragover');

    const files = e.dataTransfer.files;
    if (files.length > 0) {
        handleFileSelection(files[0]);
    }
});

// File input change
fileInput.addEventListener('change', function(e) {
    if (e.target.files.length > 0) {
        handleFileSelection(e.target.files[0]);
    }
});

// Handle file selection
function handleFileSelection(file) {
    // Validate file type by extension (more reliable than MIME type for CSV)
    const allowedExtensions = ['xlsx', 'xls', 'csv'];
    const fileName = file.name.toLowerCase();
    const extension = fileName.split('.').pop();

    if (!allowedExtensions.includes(extension)) {
        showBulkError('Please select a valid Excel or CSV file (.xlsx, .xls, .csv)');
        return;
    }

    // Check file size (max 10MB)
    if (file.size > 10 * 1024 * 1024) {
        showBulkError('File size is too large. Maximum size is 10MB.');
        return;
    }

    selectedFile = file;
    displaySelectedFile(file);
    analyzeBulkFile(file);
}

// Display selected file info
function displaySelectedFile(file) {
    const fileUploadContent = document.querySelector('.file-upload-content');
    const fileSelectedInfo = document.querySelector('.file-selected-info');

    fileUploadContent.style.display = 'none';
    fileSelectedInfo.style.display = 'block';

    document.getElementById('selectedFileName').textContent = file.name;
    document.getElementById('selectedFileSize').textContent = formatFileSize(file.size);

    hideBulkError();
}

// Format file size
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Clear selected file
function clearSelectedFile() {
    selectedFile = null;
    document.querySelector('.file-upload-content').style.display = 'block';
    document.querySelector('.file-selected-info').style.display = 'none';
    document.getElementById('columnSelectionContainer').style.display = 'none';
    document.getElementById('bulkConvertBtn').disabled = true;
    fileInput.value = '';
    hideBulkError();
}

// Analyze bulk file
function analyzeBulkFile(file) {
    showBulkProcessingStatus('Analyzing file structure...', 10);

    // Create FormData for file upload
    const formData = new FormData();
    formData.append('excel_file', file);
    formData.append('_token', document.querySelector('input[name="_token"]').value);

    // Send file to backend for analysis
    fetch('/tools/sl-idcard-analyze-file', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideBulkProcessingStatus();
        if (data.success) {
            populateColumnSelector(data.columns);
            // Show column selection
            document.getElementById('columnSelectionContainer').style.display = 'block';
            showToast('File analyzed successfully! Please select the column containing ID numbers.', 'success');
        } else {
            showBulkError(data.message || 'Failed to analyze file structure.');
            console.error('Analysis error:', data);
        }
    })
    .catch(error => {
        hideBulkProcessingStatus();
        showBulkError('Error analyzing file. Please try again.');
        console.error('Network error:', error);
    });
}

// Populate column selector
function populateColumnSelector(columns) {
    const columnSelect = document.getElementById('columnSelect');
    columnSelect.innerHTML = '<option value="">Choose column...</option>';

    columns.forEach((column) => {
        const option = document.createElement('option');
        option.value = column.index;
        option.textContent = column.name;
        columnSelect.appendChild(option);
    });

    // Enable convert button when column is selected
    columnSelect.addEventListener('change', function() {
        document.getElementById('bulkConvertBtn').disabled = !this.value;
    });
}

// Bulk conversion form submission
document.getElementById('bulkConverterForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const columnIndex = document.getElementById('columnSelect').value;
    if (!selectedFile || !columnIndex) {
        showBulkError('Please select a file and column before converting.');
        return;
    }

    processBulkConversion();
});

// Process bulk conversion
function processBulkConversion() {
    showBulkProcessingStatus('Reading Excel file...', 20);

    // Create FormData for file upload
    const formData = new FormData();
    formData.append('excel_file', selectedFile);
    formData.append('column_index', document.getElementById('columnSelect').value);
    formData.append('conversion_type', currentBulkFormat);
    formData.append('_token', document.querySelector('input[name="_token"]').value);

    // Make AJAX request to backend
    fetch('/tools/sl-idcard-bulk-convert', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideBulkProcessingStatus();
        if (data.success) {
            completeBulkConversion(data.data);
        } else {
            showBulkError(data.message || 'An error occurred during conversion.');
        }
    })
    .catch(error => {
        hideBulkProcessingStatus();
        showBulkError('Network error occurred. Please try again.');
        console.error('Error:', error);
    });
}

// Complete bulk conversion
function completeBulkConversion(results) {
    conversionResults = results;

    // Update result displays
    document.getElementById('totalProcessed').textContent = results.total.toLocaleString();
    document.getElementById('successfulCount').textContent = results.successful.toLocaleString();
    document.getElementById('failedCount').textContent = results.failed.toLocaleString();

    // Show results
    document.getElementById('bulkResults').classList.add('show');

    // Add animation classes
    document.querySelectorAll('#bulkResults .result-item').forEach((item, index) => {
        item.classList.add('bulk-result-item');
        item.style.animationDelay = (index * 0.1) + 's';
    });

    showToast(`Conversion complete! ${results.successful} IDs converted successfully.`, 'success');
}

// Download converted file
function downloadConvertedFile() {
    if (!conversionResults || !conversionResults.download_url) {
        showToast('No results available for download.', 'error');
        return;
    }

    // Use the actual download URL from the backend
    window.location.href = conversionResults.download_url;
    showToast('Download started! Check your downloads folder.', 'success');
}

// Generate sample CSV for demo
function generateSampleCSV() {
    const header = currentBulkFormat === 'bulk-old-to-new'
        ? 'Original_ID,Converted_ID,Status\n'
        : 'Original_ID,Converted_ID,Status\n';

    let content = header;

    // Add sample data
    for (let i = 1; i <= 10; i++) {
        if (currentBulkFormat === 'bulk-old-to-new') {
            content += `98321142${i}V,19983210142${i},Success\n`;
        } else {
            content += `19983210142${i},98321142${i}V,Success\n`;
        }
    }

    return content;
}

// Download template files
function downloadTemplate(format) {
    // Create FormData for template request
    const formData = new FormData();
    formData.append('format', format);
    formData.append('_token', document.querySelector('input[name="_token"]').value);

    // Request template from backend
    fetch('/tools/sl-idcard-download-template', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.blob();
        }
        throw new Error('Failed to download template');
    })
    .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = format === 'old-format' ? 'old_format_template.xlsx' : 'new_format_template.xlsx';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);

        showToast(`${format} template downloaded!`, 'success');
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Failed to download template. Please try again.', 'error');
    });
}

// Reset bulk converter
function resetBulkConverter() {
    clearSelectedFile();
    hideBulkProcessingStatus();
    hideBulkResults();
    hideBulkError();
    conversionResults = null;
}

// Show/Hide functions for bulk converter
function showBulkProcessingStatus(text, progress) {
    document.getElementById('bulkProcessingStatus').style.display = 'block';
    document.getElementById('statusText').textContent = text;
    document.getElementById('progressText').textContent = progress + '%';
    document.getElementById('progressBar').style.width = progress + '%';

    // Add glow effect to progress text
    document.getElementById('progressText').classList.add('progress-text-glow');

    // Disable upload section
    document.querySelector('.upload-section').classList.add('processing');
}

function hideBulkProcessingStatus() {
    document.getElementById('bulkProcessingStatus').style.display = 'none';
    document.querySelector('.upload-section').classList.remove('processing');
}

function showBulkError(message) {
    document.getElementById('bulkErrorText').textContent = message;
    document.getElementById('bulkError').classList.add('show');
}

function hideBulkError() {
    document.getElementById('bulkError').classList.remove('show');
}

function showBulkResults() {
    document.getElementById('bulkResults').classList.add('show');
}

function hideBulkResults() {
    document.getElementById('bulkResults').classList.remove('show');
}
</script>
@endsection
