@extends('layouts.app')

@section('title', 'Sri Lanka Police Stations Directory 2025 - Contact Numbers, Addresses & Emergency Services')
@section('description', 'Complete Sri Lanka Police Station Directory with contact numbers, addresses, and OIC details. Find police stations near you in all provinces - Colombo, Kandy, Galle, Jaffna & more. Emergency police contacts 119.')

@push('meta')
<meta name="keywords" content="Sri Lanka police stations, police directory Sri Lanka, police contact numbers, emergency services Sri Lanka, police stations near me, OIC contact details, police divisions Sri Lanka, police emergency number 119, Colombo police stations, Kandy police stations, Galle police stations">
<meta name="robots" content="index, follow">
<meta name="author" content="Sri Lanka Police Directory">
<meta property="og:title" content="Sri Lanka Police Stations Directory 2025 - Emergency Contacts & Locations">
<meta property="og:description" content="Find any police station in Sri Lanka with contact numbers, addresses, and officer details. Complete directory for all provinces and divisions.">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Sri Lanka Police Directory - Find Police Stations & Emergency Contacts">
<meta name="twitter:description" content="Complete directory of Sri Lankan police stations with contact information and locations.">
<link rel="canonical" href="{{ url()->current() }}">
@endpush

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endpush

@push('styles')
<style>
    /* Modern Typography & Base Styles */
    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    .directory-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
        position: relative;
    }

    .directory-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23e2e8f0' fill-opacity='0.3'%3E%3Ccircle cx='30' cy='30' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        pointer-events: none;
    }

    .container {
        position: relative;
        z-index: 1;
    }

    /* Typography Improvements */
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        letter-spacing: -0.025em;
        line-height: 1.2;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: #64748b;
        font-weight: 400;
        line-height: 1.6;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Table Styles */
    .custom-table {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        margin-top: 2rem;
        border: 1px solid #e2e8f0;
    }

    .custom-table thead th {
        background: #3b82f6;
        border: none;
        padding: 1rem;
        font-weight: 600;
        color: #ffffff;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .custom-table tbody td {
        padding: 1rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        color: #374151;
        font-size: 0.9rem;
    }

    .custom-table tbody tr:last-child td {
        border-bottom: none;
    }

    .custom-table tbody tr:hover {
        background: #f8fafc;
        transition: background-color 0.2s ease;
    }

    /* DataTables Customization */
    .dataTables_wrapper .dataTables_filter input {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.5rem;
        margin-left: 0.5rem;
        font-size: 0.9rem;
        color: #374151;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        margin: 0 2px;
        color: #374151;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
    }

    /* Section Transitions */
    .section-expandable {
        background: #ffffff;
        border-radius: 16px;
        margin-top: 2rem;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        border: 1px solid #e2e8f0;
        padding: 2rem;
    }

    .section-expandable.show {
        display: block;
        animation: slideDown 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Section Headers */
    .section-expandable h3 {
        color: #1e293b;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 0.5rem;
    }

    /* Search Container */
    .search-container {
        background: #ffffff;
        border-radius: 16px;
        padding: 3rem 2rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        margin-bottom: 3rem;
        border: 1px solid #e2e8f0;
        backdrop-filter: blur(10px);
    }

    .search-input {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        color: #1e293b;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        font-size: 1.1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        font-weight: 500;
    }

    .search-input::placeholder {
        color: #94a3b8;
        font-weight: 400;
    }

    .search-input:focus {
        outline: none;
        border-color: #3b82f6;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        transform: translateY(-1px);
    }

    /* Search Results Styling */
    .search-results {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        z-index: 1050;
        max-height: 400px;
        overflow-y: auto;
        display: none;
        margin-top: 0.5rem;
    }

    .search-results.show {
        display: block;
    }

    .search-result-item {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f1f5f9;
        cursor: pointer;
        transition: all 0.2s ease;
        color: #374151;
    }

    .search-result-item:last-child {
        border-bottom: none;
    }

    .search-result-item:hover {
        background: #f8fafc;
        color: #1e293b;
    }

    /* Province Grid */
    .province-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
        padding: 0;
    }

    @media (max-width: 768px) {
        .province-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }

    .province-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 2rem 1.5rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #e2e8f0;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .province-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
        transition: all 0.5s ease;
    }

    .province-card:hover {
        transform: translateY(-8px);
        border-color: #3b82f6;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .province-card:hover::before {
        left: 100%;
    }

    .province-card.active {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.3), 0 10px 10px -5px rgba(59, 130, 246, 0.2);
        border-color: #1d4ed8;
    }

    .province-card.active .province-name,
    .province-card.active .province-stats {
        color: white;
    }

    /* Loading Spinner */
    .loading-spinner {
        display: inline-block;
        width: 24px;
        height: 24px;
        border: 3px solid #e2e8f0;
        border-radius: 50%;
        border-top-color: #3b82f6;
        animation: spin 1s linear infinite;
        margin-right: 0.5rem;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Button Styles */
    .btn {
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
        transform: translateY(-1px);
        box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
        color: white;
    }

    .btn-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        transform: translateY(-1px);
        color: white;
    }

    .btn-info {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(6, 182, 212, 0.2);
    }

    .btn-info:hover {
        background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
        transform: translateY(-1px);
        color: white;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.75rem;
    }

    .province-name {
        font-size: 1.25rem;
        color: #1e293b;
        margin-bottom: 0.75rem;
        font-weight: 700;
        letter-spacing: -0.025em;
    }

    .province-stats {
        font-size: 0.875rem;
        color: #64748b;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .province-stats::before {
        content: "📍";
        font-size: 1rem;
    }

    /* Card Components */
    .card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.75rem;
        letter-spacing: -0.025em;
    }

    .card-text {
        color: #64748b;
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }

    /* Alert Styles */
    .alert {
        padding: 1rem;
        border-radius: 8px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #dc2626;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .directory-section {
            padding: 40px 0;
        }

        .search-container {
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .section-expandable {
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .custom-table {
            font-size: 0.875rem;
        }

        .custom-table thead th,
        .custom-table tbody td {
            padding: 0.75rem 0.5rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.7rem;
        }

        .d-flex.gap-2 {
            flex-direction: column;
            gap: 0.5rem;
        }

        .d-flex.gap-2 .btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .search-container {
            padding: 1.5rem 1rem;
        }

        .section-title {
            font-size: 1.75rem;
        }

        .province-card {
            padding: 1.5rem 1rem;
        }

        .section-expandable {
            padding: 1rem;
        }
    }

    /* Utility Classes */
    .text-center { text-align: center; }
    .mb-4 { margin-bottom: 1.5rem; }
    .mt-4 { margin-top: 1.5rem; }
    .d-flex { display: flex; }
    .gap-2 { gap: 0.5rem; }
    .w-100 { width: 100%; }
    .h-100 { height: 100%; }

    /* Focus States for Accessibility */
    .province-card:focus,
    .btn:focus,
    .search-input:focus {
        outline: 2px solid #3b82f6;
        outline-offset: 2px;
    }
</style>
@endpush

@section('content')
<div class="directory-section">
    <div class="container">
        <!-- Search Section -->
        <div class="search-container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="text-center mb-4 section-title">
                        <i class="bi bi-shield-check me-3" style="color: #3b82f6;"></i>
                        Sri Lanka Police Station Directory 2025
                    </h1>
                    <p class="text-center mb-4 section-subtitle">
                        Complete directory of <strong>Sri Lankan police stations</strong> with verified contact numbers, addresses, and OIC details.
                        Find police stations near you in <strong>Colombo, Kandy, Galle, Jaffna</strong> and all provinces.
                        <span style="color: #dc2626; font-weight: 600;">Emergency: 119</span>
                    </p>
                    <div class="position-relative">
                        <div style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8; z-index: 10;">
                            <i class="bi bi-search"></i>
                        </div>
                        <input type="text"
                               class="search-input"
                               style="padding-left: 3rem;"
                               placeholder="Type to search police stations..."
                               id="stationSearch">
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Results Section -->
        <div id="searchResultsSection" class="section-expandable">
            <div class="custom-table">
                <div class="table-responsive">
                    <table class="table table-hover" id="searchResultsTable">
                        <thead>
                            <tr>
                                <th>Station Name</th>
                                <th>Division</th>
                                <th>Province</th>
                                <th>Contact Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SEO Content Section -->
        <div class="seo-content-section" style="margin: 3rem 0; background: #ffffff; border-radius: 16px; padding: 2rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 style="color: #1e293b; font-weight: 700; font-size: 1.75rem; margin-bottom: 1.5rem; text-align: center;">
                        Complete Sri Lanka Police Station Directory & Emergency Services
                    </h2>

                    <div class="row g-4 mb-4">
                        <div class="col-md-4 text-center">
                            <div style="background: #f0f9ff; border-radius: 12px; padding: 1.5rem; border: 1px solid #e0f2fe;">
                                <i class="bi bi-telephone-fill" style="font-size: 2rem; color: #0284c7; margin-bottom: 1rem;"></i>
                                <h3 style="font-size: 1.1rem; font-weight: 600; color: #1e293b; margin-bottom: 0.5rem;">Emergency Hotline</h3>
                                <p style="color: #64748b; margin: 0; font-weight: 600; font-size: 1.1rem;">119</p>
                                <small style="color: #64748b;">24/7 Police Emergency</small>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="background: #f0fdf4; border-radius: 12px; padding: 1.5rem; border: 1px solid #dcfce7;">
                                <i class="bi bi-geo-alt-fill" style="font-size: 2rem; color: #16a34a; margin-bottom: 1rem;"></i>
                                <h3 style="font-size: 1.1rem; font-weight: 600; color: #1e293b; margin-bottom: 0.5rem;">All Provinces</h3>
                                <p style="color: #64748b; margin: 0; font-weight: 600;">9 Provinces</p>
                                <small style="color: #64748b;">Complete Coverage</small>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="background: #fef7ff; border-radius: 12px; padding: 1.5rem; border: 1px solid #f3e8ff;">
                                <i class="bi bi-building" style="font-size: 2rem; color: #9333ea; margin-bottom: 1rem;"></i>
                                <h3 style="font-size: 1.1rem; font-weight: 600; color: #1e293b; margin-bottom: 0.5rem;">Police Stations</h3>
                                <p style="color: #64748b; margin: 0; font-weight: 600;">74+ Stations</p>
                                <small style="color: #64748b;">Island-wide Network</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 style="color: #1e293b; font-weight: 600; font-size: 1.25rem; margin-bottom: 1rem;">
                            🚔 About Sri Lanka Police Directory
                        </h3>
                        <p style="color: #4b5563; line-height: 1.6; margin-bottom: 1rem;">
                            Our comprehensive <strong>Sri Lanka Police Station Directory</strong> provides instant access to contact information for police stations across all nine provinces. Whether you need to find the nearest police station in <strong>Colombo, Kandy, Galle, Jaffna, Batticaloa</strong>, or any other location, our directory includes verified contact numbers, addresses, and Officer-in-Charge (OIC) details.
                        </p>
                        <p style="color: #4b5563; line-height: 1.6; margin-bottom: 1rem;">
                            In emergency situations, always call <strong>119</strong> for immediate police assistance. For non-emergency inquiries, use our directory to find the appropriate local police station with accurate contact details updated in 2025.
                        </p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <h4 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                🏛️ Major Police Divisions
                            </h4>
                            <ul style="color: #4b5563; margin: 0; padding-left: 1.25rem;">
                                <li><strong>Colombo Central Division</strong> - Fort, Pettah, Kotahena</li>
                                <li><strong>Colombo South Division</strong> - Mount Lavinia, Dehiwala</li>
                                <li><strong>Kandy Division</strong> - Kandy City, Peradeniya, Gampola</li>
                                <li><strong>Galle Division</strong> - Galle Fort, Hikkaduwa, Ambalangoda</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                📞 Services Available
                            </h4>
                            <ul style="color: #4b5563; margin: 0; padding-left: 1.25rem;">
                                <li>Police Station Contact Numbers</li>
                                <li>Officer-in-Charge (OIC) Mobile Numbers</li>
                                <li>Station Addresses & Locations</li>
                                <li>Email Contacts for Non-Emergency</li>
                            </ul>
                        </div>
                    </div>

                    <div style="background: #fef3c7; border-radius: 8px; padding: 1rem; border-left: 4px solid #f59e0b;">
                        <p style="margin: 0; color: #92400e; font-weight: 500;">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Important:</strong> For life-threatening emergencies, always dial <strong>119</strong> immediately. This directory is for finding contact information for non-emergency police services and general inquiries.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Provinces Grid -->
        <div class="province-grid" id="provinceGrid">
            @foreach($provinces as $province)
            <div class="province-card" data-province-id="{{ $province->id }}">
                <h3 class="province-name">{{ $province->name }}</h3>
                <div class="province-stats">
                    <span>{{ $province->divisions_count }} Divisions</span> •
                    <span>{{ $province->stations_count }} Stations</span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Divisions Section -->
        <div id="divisionsSection" class="section-expandable">
            <h3 class="mb-4" id="divisionsTitle"></h3>
            <div class="row" id="divisionsList"></div>
        </div>

        <!-- Stations Section -->
        <div id="stationsSection" class="section-expandable">
            <h3 class="mb-4" id="stationsTitle"></h3>
            <div class="custom-table">
                <div class="table-responsive">
                    <table class="table table-hover" id="stationsTable">
                        <thead>
                            <tr>
                                <th>Station Name</th>
                                <th>Address</th>
                                <th>OIC Mobile</th>
                                <th>Office Phone</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SEO FAQ Section -->
        <div class="faq-section" style="margin: 3rem 0; background: #ffffff; border-radius: 16px; padding: 2rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2 style="color: #1e293b; font-weight: 700; font-size: 1.75rem; margin-bottom: 2rem; text-align: center;">
                        Frequently Asked Questions - Sri Lanka Police Directory
                    </h2>

                    <div class="faq-grid" style="display: grid; gap: 1.5rem;">
                        <div style="background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid #e2e8f0;">
                            <h3 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                What is the emergency number for Sri Lanka Police?
                            </h3>
                            <p style="color: #4b5563; margin: 0; line-height: 1.6;">
                                The emergency number for Sri Lanka Police is <strong>119</strong>. This is available 24/7 for all emergency situations requiring immediate police assistance.
                            </p>
                        </div>

                        <div style="background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid #e2e8f0;">
                            <h3 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                How can I find the nearest police station in Sri Lanka?
                            </h3>
                            <p style="color: #4b5563; margin: 0; line-height: 1.6;">
                                Use our search function above to find police stations by name, location, or province. You can also browse by province to see all police divisions and stations in your area with complete contact information.
                            </p>
                        </div>

                        <div style="background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid #e2e8f0;">
                            <h3 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                Are police station contact numbers updated regularly?
                            </h3>
                            <p style="color: #4b5563; margin: 0; line-height: 1.6;">
                                Yes, our directory is updated regularly with the latest contact information including office phone numbers, OIC mobile numbers, and email addresses for 2025.
                            </p>
                        </div>

                        <div style="background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid #e2e8f0;">
                            <h3 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                What information is available for each police station?
                            </h3>
                            <p style="color: #4b5563; margin: 0; line-height: 1.6;">
                                For each police station, you can find the official address, office phone number, Officer-in-Charge (OIC) mobile number, email contact, and the division it belongs to.
                            </p>
                        </div>

                        <div style="background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid #e2e8f0;">
                            <h3 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                Which provinces are covered in this directory?
                            </h3>
                            <p style="color: #4b5563; margin: 0; line-height: 1.6;">
                                Our directory covers all 9 provinces in Sri Lanka: Western, Central, Southern, Northern, Eastern, North Western, North Central, Uva, and Sabaragamuwa provinces with their respective police divisions and stations.
                            </p>
                        </div>

                        <div style="background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid #e2e8f0;">
                            <h3 style="color: #1e293b; font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">
                                Can I contact police stations for non-emergency matters?
                            </h3>
                            <p style="color: #4b5563; margin: 0; line-height: 1.6;">
                                Yes, you can contact police stations directly using the provided phone numbers or email addresses for non-emergency matters such as inquiries, reports, or administrative purposes.
                            </p>
                        </div>
                    </div>

                    <!-- Additional SEO Keywords Section -->
                    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
                        <h3 style="color: #1e293b; font-weight: 600; font-size: 1.25rem; margin-bottom: 1rem; text-align: center;">
                            Popular Police Station Searches
                        </h3>
                        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; justify-content: center;">
                            <span style="background: #e0f2fe; color: #0c4a6e; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Fort Police Station</span>
                            <span style="background: #f0fdf4; color: #14532d; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Kandy Police Station</span>
                            <span style="background: #fef3c7; color: #92400e; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Galle Police Station</span>
                            <span style="background: #fce7f3; color: #be185d; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Mount Lavinia Police</span>
                            <span style="background: #ede9fe; color: #6b21a8; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Negombo Police Station</span>
                            <span style="background: #e0f2fe; color: #0c4a6e; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Jaffna Police Station</span>
                            <span style="background: #f0fdf4; color: #14532d; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Batticaloa Police</span>
                            <span style="background: #fef3c7; color: #92400e; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">Anuradhapura Police</span>
                        </div>
                        <p style="text-align: center; color: #6b7280; font-size: 0.875rem; margin-top: 1rem; margin-bottom: 0;">
                            Find contact details for these and many more police stations across Sri Lanka
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Structured Data for SEO -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Sri Lanka Police Station Directory",
    "description": "Complete directory of police stations in Sri Lanka with contact numbers, addresses, and emergency services information.",
    "url": "{{ url()->current() }}",
    "inLanguage": "en",
    "publisher": {
        "@type": "Organization",
        "name": "Sri Lanka Police Directory",
        "url": "{{ url('/') }}"
    },
    "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "Police Directory",
            "item": "{{ url()->current() }}"
        }]
    },
    "mainEntity": {
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "What is the emergency number for Sri Lanka Police?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The emergency number for Sri Lanka Police is 119. This is available 24/7 for all emergency situations requiring immediate police assistance."
            }
        }, {
            "@type": "Question",
            "name": "How can I find the nearest police station in Sri Lanka?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Use our search function to find police stations by name, location, or province. You can also browse by province to see all police divisions and stations in your area."
            }
        }, {
            "@type": "Question",
            "name": "Which provinces are covered in this directory?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Our directory covers all 9 provinces in Sri Lanka: Western, Central, Southern, Northern, Eastern, North Western, North Central, Uva, and Sabaragamuwa provinces."
            }
        }]
    },
    "about": {
        "@type": "Thing",
        "name": "Sri Lanka Police Emergency Services",
        "description": "Police emergency services and contact information for Sri Lanka"
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Police Directory: DOM loaded, initializing...');

    // Initialize DOM elements
    const searchInput = document.getElementById('stationSearch');
    const searchResultsSection = document.getElementById('searchResultsSection');
    const provinceGrid = document.getElementById('provinceGrid');
    const divisionsSection = document.getElementById('divisionsSection');
    const stationsSection = document.getElementById('stationsSection');
    const divisionsTitle = document.getElementById('divisionsTitle');
    const divisionsList = document.getElementById('divisionsList');
    const stationsTitle = document.getElementById('stationsTitle');

    console.log('Police Directory: Elements found:', {
        searchInput: !!searchInput,
        searchResultsSection: !!searchResultsSection,
        provinceGrid: !!provinceGrid,
        divisionsSection: !!divisionsSection,
        stationsSection: !!stationsSection
    });

    // Initialize DataTables
    const searchResultsTable = $('#searchResultsTable').DataTable({
        pageLength: 10,
        order: [[0, 'asc']],
        language: {
            search: "Filter results:"
        },
        responsive: true
    });

    const stationsTable = $('#stationsTable').DataTable({
        pageLength: 10,
        order: [[0, 'asc']],
        language: {
            search: "Filter stations:"
        },
        responsive: true
    });

    // Debounce utility function
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Search functionality
    searchInput.addEventListener('input', debounce(async (e) => {
        const query = e.target.value.trim();
        console.log('Search query:', query);

        if (query.length < 2) {
            searchResultsSection.classList.remove('show');
            return;
        }

    try {
        const response = await fetch(`/api/police/search?q=${encodeURIComponent(query)}`);
        const data = await response.json();

        // Clear existing search results
        searchResultsTable.clear();

        if (data.stations.length > 0) {
            // Add new data to the table
            data.stations.forEach(station => {
                searchResultsTable.row.add([
                    station.name,
                    station.division.name,
                    station.division.province.name,
                    station.office_phone || 'N/A',
                    `<div class="d-flex gap-2">
                        ${station.office_phone ?
                            `<a href="tel:${station.office_phone}" class="btn btn-sm btn-success">
                                <i class="bi bi-telephone"></i> Call
                            </a>` : ''
                        }
                        ${station.email ?
                            `<a href="mailto:${station.email}" class="btn btn-sm btn-primary">
                                <i class="bi bi-envelope"></i> Email
                            </a>` : ''
                        }
                        <button class="btn btn-sm btn-info" onclick="showStationDetails(${station.id})">
                            <i class="bi bi-info-circle"></i> Details
                        </button>
                    </div>`
                ]);
            });

            // Draw the table and show the section
            searchResultsTable.draw();
            searchResultsSection.classList.add('show');

            // Hide other sections
            divisionsSection.classList.remove('show');
            stationsSection.classList.remove('show');

            // Scroll to results
            searchResultsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    } catch (error) {
        console.error('Search error:', error);
        // Show user-friendly error message
        searchResultsTable.clear();
        searchResultsTable.row.add([
            'Error loading results',
            'Please try again later',
            '',
            '',
            ''
        ]);
        searchResultsTable.draw();
        searchResultsSection.classList.add('show');
    }
    }, 300));

    // Province card click handler
    provinceGrid.addEventListener('click', async (e) => {
    const provinceCard = e.target.closest('.province-card');
    if (!provinceCard) return;

    // Remove active class from all cards
    document.querySelectorAll('.province-card').forEach(card => card.classList.remove('active'));
    provinceCard.classList.add('active');

    const provinceId = provinceCard.dataset.provinceId;

    // Show loading state
    divisionsTitle.textContent = 'Loading divisions...';
    divisionsList.innerHTML = `
        <div class="col-12 text-center" style="padding: 3rem;">
            <div class="loading-spinner" style="width: 32px; height: 32px; border-width: 4px; margin: 0 auto 1rem;"></div>
            <p style="color: #64748b; font-weight: 500;">Loading divisions...</p>
        </div>
    `;
    divisionsSection.classList.add('show');

    try {
        const response = await fetch(`/api/police/provinces/${provinceId}/divisions`);
        const data = await response.json();

        divisionsTitle.textContent = `${data.province.name} Police Divisions`;
        divisionsList.innerHTML = data.divisions.map(division => `
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 division-item" data-division-id="${division.id}">
                    <div class="card-body">
                        <h5 class="card-title">${division.name}</h5>
                        <p class="card-text text-muted">${division.stations_count} Stations</p>
                        <button class="btn btn-primary w-100" onclick="showDivisionStations(${division.id})">
                            View Stations
                        </button>
                    </div>
                </div>
            </div>
        `).join('');

        // Hide other sections and show divisions
        searchResultsSection.classList.remove('show');
        stationsSection.classList.remove('show');
        divisionsSection.classList.add('show');

        // Scroll to divisions section
        divisionsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } catch (error) {
        console.error('Error fetching divisions:', error);
        // Show user-friendly error message
        divisionsTitle.textContent = 'Error Loading Divisions';
        divisionsList.innerHTML = `
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-triangle"></i>
                    Failed to load divisions. Please try again later.
                </div>
            </div>
        `;
        divisionsSection.classList.add('show');
    }
    });

    // Show division stations
    async function showDivisionStations(divisionId) {
    try {
        const response = await fetch(`/api/police/divisions/${divisionId}/stations`);
        const data = await response.json();

        stationsTitle.textContent = `${data.division.name} Police Stations`;

        // Clear existing stations
        stationsTable.clear();

        // Add stations to table
        data.stations.forEach(station => {
            stationsTable.row.add([
                station.name,
                station.address || 'N/A',
                station.oic_mobile || 'N/A',
                station.office_phone || 'N/A',
                station.email || 'N/A',
                `<div class="d-flex gap-2">
                    ${station.office_phone ?
                        `<a href="tel:${station.office_phone}" class="btn btn-sm btn-success">
                            <i class="bi bi-telephone"></i> Call
                        </a>` : ''
                    }
                    ${station.email ?
                        `<a href="mailto:${station.email}" class="btn btn-sm btn-primary">
                            <i class="bi bi-envelope"></i> Email
                        </a>` : ''
                    }
                </div>`
            ]);
        });

        // Draw the table and show the section
        stationsTable.draw();
        stationsSection.classList.add('show');

        // Scroll to stations section
        stationsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } catch (error) {
        console.error('Error fetching stations:', error);
    }
    }

    // Show station details
    async function showStationDetails(stationId) {
    try {
        const response = await fetch(`/api/police/stations/${stationId}`);
        const station = await response.json();

        // Clear existing stations
        stationsTable.clear();

        // Add single station to table
        stationsTable.row.add([
            station.name,
            station.address || 'N/A',
            station.oic_mobile || 'N/A',
            station.office_phone || 'N/A',
            station.email || 'N/A',
            `<div class="d-flex gap-2">
                ${station.office_phone ?
                    `<a href="tel:${station.office_phone}" class="btn btn-sm btn-success">
                        <i class="bi bi-telephone"></i> Call
                    </a>` : ''
                }
                ${station.email ?
                    `<a href="mailto:${station.email}" class="btn btn-sm btn-primary">
                        <i class="bi bi-envelope"></i> Email
                    </a>` : ''
                }
            </div>`
        ]);

        // Draw the table and show the section
        stationsTable.draw();
        stationsTitle.textContent = `${station.division.name} Police Station Details`;
        stationsSection.classList.add('show');

        // Hide other sections
        searchResultsSection.classList.remove('show');
        divisionsSection.classList.remove('show');

        // Scroll to stations section
        stationsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } catch (error) {
        console.error('Error fetching station details:', error);
    }
    }

    // Close search results when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.search-container')) {
            searchResultsSection.classList.remove('show');
        }
    });

    // Make showStationDetails and showDivisionStations available globally
    window.showStationDetails = showStationDetails;
    window.showDivisionStations = showDivisionStations;
});
</script>
@endpush
