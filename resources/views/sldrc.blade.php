@extends('layouts.app')

@section('body-class', 'sldrc-page')

@section('title', 'SLDRC App - Digital Vehicle Management for Sri Lankan Drivers | Ezofz Technology')
@section('meta_description', 'Transform your vehicle record-keeping with SLDRC App. Digital trip management, fuel tracking, maintenance scheduling for Sri Lankan drivers. Download now on Google Play. Developed by Ezofz Technology Solutions.')
@section('meta_keywords', 'SLDRC App, vehicle management, Sri Lankan drivers, trip tracking, fuel management, digital records, Ezofz Technology, mobile app, Flutter, Firebase, vehicle maintenance')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-right">
                    <div class="app-badge">
                        <span class="badge-icon">🚗</span>
                        <span class="badge-text">SLDRC App</span>
                    </div>
                    <h1 class="hero-title">Digital Vehicle Management for Sri Lankan Drivers</h1>
                    <p class="hero-description">
                        Transform your vehicle record-keeping with our comprehensive digital solution.
                        Track trips, monitor fuel consumption, and manage maintenance schedules with ease.
                    </p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label">Downloads</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">4.8★</span>
                            <span class="stat-label">Rating</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">Free</span>
                            <span class="stat-label">Forever</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#download" class="btn-primary">
                            <i class="bi bi-google-play"></i>
                            Download Now
                        </a>
                        <a href="#features" class="btn-secondary">
                            <i class="bi bi-play-circle"></i>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image" data-aos="fade-left">
                    <div class="phone-mockup">
                        <img src="{{ asset('images/sldrc_app/dashboard.jpg') }}" alt="SLDRC App Dashboard" class="phone-screen">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section" id="features">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Key Features</h2>
            <p class="section-subtitle">Everything you need for comprehensive vehicle management</p>
        </div>

        <div class="features-grid">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <h3>Trip Recording</h3>
                <p>Track your journeys with detailed location data, distance calculation, and time logging</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                    <i class="bi bi-fuel-pump"></i>
                </div>
                <h3>Fuel Management</h3>
                <p>Monitor fuel consumption, calculate efficiency, and track refueling history</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon">
                    <i class="bi bi-tools"></i>
                </div>
                <h3>Maintenance Tracking</h3>
                <p>Schedule services, track maintenance history, and set maintenance reminders</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-icon">
                    <i class="bi bi-bar-chart"></i>
                </div>
                <h3>Analytics & Reports</h3>
                <p>Generate detailed reports and analytics for better vehicle management decisions</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-icon">
                    <i class="bi bi-translate"></i>
                </div>
                <h3>Bilingual Support</h3>
                <p>Available in both English and Sinhala for all Sri Lankan drivers</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h3>Secure & Reliable</h3>
                <p>Your data is safely stored with enterprise-grade security and real-time sync</p>
            </div>
        </div>
    </div>
</section>

<!-- Screenshots Section -->
<section class="screenshots-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">App Screenshots</h2>
            <p class="section-subtitle">Beautiful and intuitive interface designed for Sri Lankan drivers</p>
        </div>

        <div class="screenshots-grid">
            <div class="screenshot-item" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('images/sldrc_app/dashboard.jpg') }}" alt="Dashboard" class="screenshot-img">
                <h4>Dashboard</h4>
                <p>Overview of your vehicles and recent activity</p>
            </div>

            <div class="screenshot-item" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('images/sldrc_app/trip_recording.jpg') }}" alt="Trip Recording" class="screenshot-img">
                <h4>Trip Recording</h4>
                <p>Easy trip logging with automatic calculations</p>
            </div>

            <div class="screenshot-item" data-aos="zoom-in" data-aos-delay="300">
                <img src="{{ asset('images/sldrc_app/vehicle_management.jpg') }}" alt="Vehicle Management" class="screenshot-img">
                <h4>Vehicle Management</h4>
                <p>Comprehensive vehicle profiles and details</p>
            </div>

            <div class="screenshot-item" data-aos="zoom-in" data-aos-delay="400">
                <img src="{{ asset('images/sldrc_app/detailed_reports.jpg') }}" alt="Reports" class="screenshot-img">
                <h4>Detailed Reports</h4>
                <p>Analytics and insights for better decisions</p>
            </div>
        </div>
    </div>
</section>

<!-- Download Section -->
<section class="download-section" id="download">
    <div class="container">
        <div class="download-content" data-aos="fade-up">
            <h2 class="download-title">Ready to Go Digital?</h2>
            <p class="download-subtitle">Join thousands of Sri Lankan drivers managing their vehicles digitally</p>

            <div class="download-buttons">
                <a href="#" class="download-btn google-play">
                    <i class="bi bi-google-play"></i>
                    <div class="btn-text">
                        <span class="btn-label">Get it on</span>
                        <span class="btn-store">Google Play</span>
                    </div>
                </a>
                <a href="{{ asset('downloads/sldrc_app.apk') }}" download="SLDRC_App.apk" class="download-btn direct-download">
                    <i class="bi bi-download"></i>
                    <div class="btn-text">
                        <span class="btn-label">Direct Download</span>
                        <span class="btn-store">APK File</span>
                    </div>
                </a>
                <a href="#" class="download-btn app-store disabled">
                    <i class="bi bi-apple"></i>
                    <div class="btn-text">
                        <span class="btn-label">Coming Soon</span>
                        <span class="btn-store">App Store</span>
                    </div>
                </a>
            </div>

            <div class="download-features">
                <div class="download-feature">
                    <i class="bi bi-shield-check"></i>
                    <span>100% Safe & Secure</span>
                </div>
                <div class="download-feature">
                    <i class="bi bi-download"></i>
                    <span>Free Download</span>
                </div>
                <div class="download-feature">
                    <i class="bi bi-phone"></i>
                    <span>Works Offline</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- App Usage Instructions Section -->
<section class="instructions-section" id="instructions">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">How to Use SLDRC App</h2>
            <h3 class="section-title-sinhala">SLDRC යෙදුම භාවිතා කරන්නේ කොහොමද?</h3>
            <p class="section-subtitle">Complete step-by-step guide to get started with digital vehicle management</p>
            <p class="section-subtitle-sinhala">ඩිජිටල් වාහන කළමනාකරණය ආරම්භ කිරීම සඳහා සම්පූර්ණ පියවරෙන් පියවර මාර්ගෝපදේශය</p>
        </div>

        <div class="instructions-grid">
            <!-- Step 1: Registration -->
            <div class="instruction-card" data-aos="fade-up" data-aos-delay="100">
                <div class="instruction-number">1</div>
                <div class="instruction-content">
                    <h3>Registration & Setup</h3>
                    <h4 class="instruction-title-sinhala">ලියාපදිංචිය සහ සැකසීම</h4>

                    <div class="instruction-steps">
                        <h5>English:</h5>
                        <ul>
                            <li>Download SLDRC App from Google Play Store</li>
                            <li>Create account with email or phone number</li>
                            <li>Complete your profile with personal details</li>
                            <li>Add your rank and regiment information</li>
                            <li>Verify your email address</li>
                        </ul>

                        <h5 class="sinhala-heading">සිංහල:</h5>
                        <ul class="sinhala-list">
                            <li>ගූගල් ප්ලේ ස්ටෝරයෙන් SLDRC යෙදුම බාගන්න</li>
                            <li>ඊමේල් හෝ දුරකථන අංකයෙන් ගිණුමක් සාදන්න</li>
                            <li>පුද්ගලික විස්තර සමඟ ඔබේ පැතිකඩ සම්පූර්ණ කරන්න</li>
                            <li>ඔබේ නිලය සහ රෙජිමේන්තු තොරතුරු එක් කරන්න</li>
                            <li>ඔබේ ඊමේල් ලිපිනය සත්‍යාපනය කරන්න</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Step 2: Add Vehicle -->
            <div class="instruction-card" data-aos="fade-up" data-aos-delay="200">
                <div class="instruction-number">2</div>
                <div class="instruction-content">
                    <h3>Add Your Vehicle</h3>
                    <h4 class="instruction-title-sinhala">ඔබගේ වාහනය එක් කරන්න</h4>

                    <div class="instruction-steps">
                        <h5>English:</h5>
                        <ul>
                            <li>Navigate to "My Vehicles" section</li>
                            <li>Tap "Add New Vehicle" button</li>
                            <li>Enter vehicle registration number</li>
                            <li>Add make, model, and manufacturing year</li>
                            <li>Set current odometer reading</li>
                            <li>Add fuel tank capacity</li>
                        </ul>

                        <h5 class="sinhala-heading">සිංහල:</h5>
                        <ul class="sinhala-list">
                            <li>"මගේ වාහන" කොටසට යන්න</li>
                            <li>"නව වාහනයක් එක් කරන්න" බොත්තම ස්පර්ශ කරන්න</li>
                            <li>වාහන ලියාපදිංචි අංකය ඇතුළත් කරන්න</li>
                            <li>නිෂ්පාදකයා, ආකෘතිය සහ නිෂ්පාදන වර්ෂය එක් කරන්න</li>
                            <li>වර්තමාන ඕඩෝමීටර් කියවීම සකසන්න</li>
                            <li>ඉන්ධන ටැංකි ධාරිතාව එක් කරන්න</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Step 3: Record Trips -->
            <div class="instruction-card" data-aos="fade-up" data-aos-delay="300">
                <div class="instruction-number">3</div>
                <div class="instruction-content">
                    <h3>Record Your Trips</h3>
                    <h4 class="instruction-title-sinhala">ඔබගේ ගමන් සටහන් කරන්න</h4>

                    <div class="instruction-steps">
                        <h5>English:</h5>
                        <ul>
                            <li>Tap "Add New Trip" on the dashboard</li>
                            <li>Select your vehicle from the list</li>
                            <li>Enter start location and time</li>
                            <li>Record places visited during the trip</li>
                            <li>Add end location and complete the trip</li>
                            <li>System automatically calculates distance</li>
                        </ul>

                        <h5 class="sinhala-heading">සිංහල:</h5>
                        <ul class="sinhala-list">
                            <li>ඩෑෂ්බෝඩ්හි "නව ගමනක් එක් කරන්න" ස්පර්ශ කරන්න</li>
                            <li>ලැයිස්තුවෙන් ඔබගේ වාහනය තෝරන්න</li>
                            <li>ආරම්භක ස්ථානය සහ වේලාව ඇතුළත් කරන්න</li>
                            <li>ගමන අතරතුර පිනිසුරු ගිය ස්ථාන සටහන් කරන්න</li>
                            <li>අවසාන ස්ථානය එක් කර ගමන සම්පූර්ණ කරන්න</li>
                            <li>පද්ධතිය ස්වයංක්‍රීයව දුර ගණනය කරයි</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Step 4: Fuel Management -->
            <div class="instruction-card" data-aos="fade-up" data-aos-delay="400">
                <div class="instruction-number">4</div>
                <div class="instruction-content">
                    <h3>Manage Fuel Consumption</h3>
                    <h4 class="instruction-title-sinhala">ඉන්ධන පරිභෝජනය කළමනාකරණය කරන්න</h4>

                    <div class="instruction-steps">
                        <h5>English:</h5>
                        <ul>
                            <li>Go to "Fuel Management" section</li>
                            <li>Add fuel records when refueling</li>
                            <li>Enter fuel quantity and cost</li>
                            <li>Track fuel efficiency (km per liter)</li>
                            <li>Monitor monthly fuel expenses</li>
                            <li>View fuel consumption patterns</li>
                        </ul>

                        <h5 class="sinhala-heading">සිංහල:</h5>
                        <ul class="sinhala-list">
                            <li>"ඉන්ධන කළමනාකරණය" කොටසට යන්න</li>
                            <li>ඉන්ධන පිරවීමේදී ඉන්ධන වාර්තා එක් කරන්න</li>
                            <li>ඉන්ධන ප්‍රමාණය සහ වියදම ඇතුළත් කරන්න</li>
                            <li>ඉන්ධන කාර්යක්ෂමතාව නිරීක්ෂණය කරන්න (කිලෝමීටරයකට ලීටර්)</li>
                            <li>මාසික ඉන්ධන වියදම් නිරීක්ෂණය කරන්න</li>
                            <li>ඉන්ධන පරිභෝජන රටාවන් බලන්න</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Step 5: Maintenance -->
            <div class="instruction-card" data-aos="fade-up" data-aos-delay="500">
                <div class="instruction-number">5</div>
                <div class="instruction-content">
                    <h3>Vehicle Maintenance</h3>
                    <h4 class="instruction-title-sinhala">වාහන නඩත්තුව</h4>

                    <div class="instruction-steps">
                        <h5>English:</h5>
                        <ul>
                            <li>Access "Service Status" section</li>
                            <li>Schedule regular maintenance services</li>
                            <li>Set oil change reminders</li>
                            <li>Record service history and costs</li>
                            <li>Track maintenance intervals</li>
                            <li>Add service provider details</li>
                        </ul>

                        <h5 class="sinhala-heading">සිංහල:</h5>
                        <ul class="sinhala-list">
                            <li>"සේවා තත්ත්වය" කොටස ප්‍රවේශ කරන්න</li>
                            <li>නිතිපතා නඩත්තු සේවා කාලසටහන් කරන්න</li>
                            <li>තෙල් වෙනස් කිරීමේ සිහිකැඳවීම් සකසන්න</li>
                            <li>සේවා ඉතිහාසය සහ වියදම් සටහන් කරන්න</li>
                            <li>නඩත්තු කාල පරතරයන් නිරීක්ෂණය කරන්න</li>
                            <li>සේවා සපයන්නන්ගේ විස්තර එක් කරන්න</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Step 6: Reports & Analytics -->
            <div class="instruction-card" data-aos="fade-up" data-aos-delay="600">
                <div class="instruction-number">6</div>
                <div class="instruction-content">
                    <h3>View Reports & Analytics</h3>
                    <h4 class="instruction-title-sinhala">වාර්තා සහ විශ්ලේෂණ බලන්න</h4>

                    <div class="instruction-steps">
                        <h5>English:</h5>
                        <ul>
                            <li>Navigate to "Reports" tab</li>
                            <li>View monthly trip summaries</li>
                            <li>Analyze fuel efficiency trends</li>
                            <li>Check cost breakdowns and expenses</li>
                            <li>Export data for official purposes</li>
                            <li>Set custom date ranges for reports</li>
                        </ul>

                        <h5 class="sinhala-heading">සිංහල:</h5>
                        <ul class="sinhala-list">
                            <li>"වාර්තා" ටැබ්ගේට යන්න</li>
                            <li>මාසික ගමන් සාරාංශ බලන්න</li>
                            <li>ඉන්ධන කාර්යක්ෂමතා ප්‍රවණතා විශ්ලේෂණය කරන්න</li>
                            <li>වියදම් බෙදීම් සහ වියදම් පරීක්ෂා කරන්න</li>
                            <li>නිල අරමුණු සඳහා දත්ත අපනයනය කරන්න</li>
                            <li>වාර්තා සඳහා අභිරුචි දින පරාස සකසන්න</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips Section -->
        <div class="tips-section" data-aos="fade-up">
            <h3 class="tips-title">Pro Tips for Best Experience</h3>
            <h4 class="tips-title-sinhala">හොඳම අත්දැකීම සඳහා වෘත්තීය ඉඟි</h4>

            <div class="tips-grid">
                <div class="tip-card">
                    <div class="tip-icon">⏰</div>
                    <div class="tip-content">
                        <h5>Record Immediately</h5>
                        <h6>වහාම සටහන් කරන්න</h6>
                        <p><strong>English:</strong> Always record trips as soon as you start and complete them for accuracy.</p>
                        <p><strong>සිංහල:</strong> නිවැරදිකම සඳහා ඔබ ගමන් ආරම්භ කර සම්පූර්ණ කළ වහාම සටහන් කරන්න.</p>
                    </div>
                </div>

                <div class="tip-card">
                    <div class="tip-icon">🌐</div>
                    <div class="tip-content">
                        <h5>Works Offline</h5>
                        <h6>නොබැඳිව ක්‍රියා කරයි</h6>
                        <p><strong>English:</strong> App works without internet. Data syncs when connection is restored.</p>
                        <p><strong>සිංහල:</strong> යෙදුම අන්තර්ජාලය නොමැතිව ක්‍රියා කරයි. සම්බන්ධතාවය ප්‍රතිෂ්ඨාපනය වූ විට දත්ත සමමුහුර්ත වේ.</p>
                    </div>
                </div>

                <div class="tip-card">
                    <div class="tip-icon">🔄</div>
                    <div class="tip-content">
                        <h5>Regular Backup</h5>
                        <h6>නිතිපතා සිම්කරණය</h6>
                        <p><strong>English:</strong> Ensure stable internet for regular cloud backup and sync.</p>
                        <p><strong>සිංහල:</strong> නිතිපතා වලාකුළු සිම්කරණය සහ සමමුහුර්තකරණය සඳහා ස්ථායී අන්තර්ජාලයක් සහතික කරන්න.</p>
                    </div>
                </div>

                <div class="tip-card">
                    <div class="tip-icon">📱</div>
                    <div class="tip-content">
                        <h5>Multiple Devices</h5>
                        <h6>බහු උපාංග</h6>
                        <p><strong>English:</strong> Use same account on multiple devices. Data syncs automatically.</p>
                        <p><strong>සිංහල:</strong> බහු උපාංගවල එකම ගිණුම භාවිතා කරන්න. දත්ත ස්වයංක්‍රීයව සමමුහුර්ත වේ.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Section -->
<section class="company-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="company-title">Proudly Developed by Ezofz Technology Solutions</h2>
                <p class="company-description">
                    We are a leading technology company in Sri Lanka, specializing in innovative
                    mobile applications and digital solutions for real-world problems.
                </p>
                <div class="company-features">
                    <div class="company-feature">
                        <i class="bi bi-award"></i>
                        <span>5+ Years Experience</span>
                    </div>
                    <div class="company-feature">
                        <i class="bi bi-people"></i>
                        <span>50+ Projects Delivered</span>
                    </div>
                    <div class="company-feature">
                        <i class="bi bi-headset"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="btn-outline">Visit Our Website</a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="company-logo">
                    <h3>Ezofz</h3>
                    <p>Technology Solutions</p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
/* ========== MODERN APP LANDING PAGE STYLES ========== */

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.hero-section .container {
    position: relative;
    z-index: 2;
    padding-top: 80px;
}

.hero-content {
    padding: 2rem 0;
}

.app-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    padding: 8px 16px;
    margin-bottom: 2rem;
    font-size: 0.9rem;
    font-weight: 500;
}

.badge-icon {
    font-size: 1.2rem;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    background: linear-gradient(135deg, #ffffff 0%, #fbbf24 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-description {
    font-size: 1.25rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    opacity: 0.9;
    max-width: 500px;
}

.hero-stats {
    display: flex;
    gap: 3rem;
    margin-bottom: 2.5rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2rem;
    font-weight: 700;
    color: #fbbf24;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.btn-primary {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    border: none;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    color: white;
}

.btn-secondary {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    transform: translateY(-2px);
}

/* Hero Image */
.hero-image {
    text-align: center;
    padding: 2rem 0;
}

.phone-mockup {
    position: relative;
    width: 280px;
    height: 560px;
    margin: 0 auto;
    background: #1f2937;
    border-radius: 30px;
    padding: 15px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    transform: rotate(-5deg);
    transition: all 0.3s ease;
}

.phone-mockup:hover {
    transform: rotate(0deg) scale(1.05);
}

.phone-screen {
    width: 100%;
    height: 100%;
    border-radius: 20px;
    object-fit: cover;
}

/* Section Headers */
.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Features Section */
.features-section {
    padding: 6rem 0;
    background: #f8fafc;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.feature-card {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: #667eea;
}

.feature-icon {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.5rem;
    color: white;
}

.feature-card h3 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 1rem;
}

.feature-card p {
    color: #64748b;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Screenshots Section */
.screenshots-section {
    padding: 6rem 0;
    background: white;
}

.screenshots-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.screenshot-item {
    text-align: center;
}

.screenshot-img {
    width: 100%;
    max-width: 200px;
    height: auto;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.screenshot-item:hover .screenshot-img {
    transform: scale(1.05);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.screenshot-item h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.screenshot-item p {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.5;
}

/* Download Section */
.download-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    text-align: center;
}

.download-content {
    max-width: 600px;
    margin: 0 auto;
}

.download-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.download-subtitle {
    font-size: 1.1rem;
    margin-bottom: 3rem;
    opacity: 0.9;
}

.download-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.download-btn {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.5rem;
    background: white;
    color: #059669;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    min-width: 180px;
}

.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    color: #059669;
}

.download-btn.disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.download-btn.disabled:hover {
    transform: none;
    box-shadow: none;
}

.download-btn i {
    font-size: 1.5rem;
}

.btn-text {
    text-align: left;
}

.btn-label {
    display: block;
    font-size: 0.8rem;
    opacity: 0.7;
}

.btn-store {
    display: block;
    font-size: 1rem;
    font-weight: 600;
}

.download-features {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.download-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

/* Instructions Section */
.instructions-section {
    padding: 6rem 0;
    background: #f8fafc;
}

.section-title-sinhala {
    font-size: 2rem;
    font-weight: 600;
    color: #dc2626;
    margin-bottom: 1rem;
    margin-top: 0.5rem;
}

.section-subtitle-sinhala {
    font-size: 1rem;
    color: #059669;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.6;
    margin-top: 0.5rem;
}

.instructions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.instruction-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
    position: relative;
}

.instruction-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.instruction-number {
    position: absolute;
    top: -15px;
    left: 2rem;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.1rem;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.instruction-content h3 {
    font-size: 1.4rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.5rem;
    margin-top: 1rem;
}

.instruction-title-sinhala {
    font-size: 1.2rem;
    font-weight: 500;
    color: #dc2626;
    margin-bottom: 1.5rem;
}

.instruction-steps h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #374151;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    border-bottom: 2px solid #e5e7eb;
    padding-bottom: 0.5rem;
}

.sinhala-heading {
    color: #059669 !important;
}

.instruction-steps ul {
    margin-bottom: 1rem;
    padding-left: 1.25rem;
}

.instruction-steps li {
    margin-bottom: 0.5rem;
    line-height: 1.5;
    color: #4b5563;
}

.sinhala-list li {
    color: #065f46;
    font-weight: 500;
}

/* Tips Section */
.tips-section {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    border: 2px solid #e5e7eb;
}

.tips-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e293b;
    text-align: center;
    margin-bottom: 0.5rem;
}

.tips-title-sinhala {
    font-size: 1.5rem;
    font-weight: 600;
    color: #dc2626;
    text-align: center;
    margin-bottom: 2rem;
}

.tips-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.tip-card {
    background: #f9fafb;
    padding: 1.5rem;
    border-radius: 12px;
    border-left: 4px solid #667eea;
    transition: all 0.3s ease;
}

.tip-card:hover {
    background: #f3f4f6;
    transform: translateX(5px);
}

.tip-icon {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    display: block;
}

.tip-content h5 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.25rem;
}

.tip-content h6 {
    font-size: 1rem;
    font-weight: 500;
    color: #dc2626;
    margin-bottom: 0.75rem;
}

.tip-content p {
    font-size: 0.9rem;
    line-height: 1.4;
    margin-bottom: 0.5rem;
    color: #4b5563;
}

/* Responsive Design for Instructions */
@media (max-width: 768px) {
    .instructions-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .instruction-card {
        padding: 1.5rem;
    }

    .instruction-content h3 {
        font-size: 1.2rem;
    }

    .instruction-title-sinhala {
        font-size: 1.1rem;
    }

    .tips-section {
        padding: 2rem;
    }

    .tips-grid {
        grid-template-columns: 1fr;
    }

    .section-title-sinhala {
        font-size: 1.75rem;
    }
}

@media (max-width: 576px) {
    .instructions-section {
        padding: 4rem 0;
    }

    .instruction-steps h5 {
        font-size: 0.95rem;
    }

    .instruction-steps li {
        font-size: 0.9rem;
    }

    .tips-title {
        font-size: 1.75rem;
    }

    .tips-title-sinhala {
        font-size: 1.3rem;
    }
}

/* Company Section */
.company-section {
    padding: 6rem 0;
    background: #1e293b;
    color: white;
}

.company-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.company-description {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.company-features {
    margin-bottom: 2rem;
}

.company-feature {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    font-weight: 500;
}

.company-feature i {
    font-size: 1.25rem;
    color: #fbbf24;
}

.btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    border: 2px solid #fbbf24;
    color: #fbbf24;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline:hover {
    background: #fbbf24;
    color: #1e293b;
    transform: translateY(-2px);
}

.company-logo {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 3rem 2rem;
    backdrop-filter: blur(10px);
}

.company-logo h3 {
    font-size: 3rem;
    font-weight: 800;
    color: #fbbf24;
    margin-bottom: 0.5rem;
}

.company-logo p {
    font-size: 1.1rem;
    opacity: 0.8;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }

    .hero-stats {
        gap: 1.5rem;
        justify-content: center;
    }

    .hero-buttons {
        justify-content: center;
    }

    .btn-primary, .btn-secondary {
        flex: 1;
        max-width: 250px;
        justify-content: center;
    }

    .section-title {
        font-size: 2rem;
    }

    .features-grid {
        grid-template-columns: 1fr;
    }

    .phone-mockup {
        width: 240px;
        height: 480px;
        transform: none;
    }

    .download-buttons {
        flex-direction: column;
        align-items: center;
    }

    .download-features {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .company-title {
        font-size: 2rem;
    }
}

@media (max-width: 576px) {
    .hero-section .container {
        padding-top: 100px;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-description {
        font-size: 1.1rem;
    }

    .stat-number {
        font-size: 1.5rem;
    }

    .hero-stats {
        gap: 1rem;
    }

    .section-title {
        font-size: 1.75rem;
    }

    .download-title {
        font-size: 2rem;
    }
}
</style>



@push('styles')
<style>
/* Additional responsive styles */
@media (max-width: 768px) {
    .banner-title {
        font-size: 2.8rem;
        margin-bottom: 20px;
    }

    .banner-subtitle {
        font-size: 1.5rem;
        margin-bottom: 30px;
    }

    .banner-stats {
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 35px;
    }

    .banner-buttons {
        justify-content: center;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .btn-download, .btn-learn-more {
        width: 100%;
        max-width: 320px;
        justify-content: center;
        padding: 16px 20px;
    }

    .banner-description {
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 35px;
    }

    .phone-mockup {
        width: 250px;
        height: 500px;
        transform: none;
    }

    .app-content {
        padding: 10px;
        gap: 8px;
    }

    .dashboard-widget {
        padding: 10px;
    }

    .widget-title {
        font-size: 0.6rem;
    }

    .widget-value {
        font-size: 0.9rem;
    }

    .screenshot-carousel {
        animation-duration: 20s;
        gap: 20px;
    }

    .screenshot-item {
        width: 200px;
    }

    .screenshot-phone {
        width: 180px;
        height: 360px;
    }

    .screenshot-carousel-wrapper {
        margin-top: 40px;
    }

    .screenshot-item:hover {
        transform: translateY(-5px) !important;
    }

    .company-badge {
        text-align: center;
    }

    .banner-description {
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .app-banner {
        min-height: 100vh;
        padding: 0;
    }

    .app-banner .container {
        padding-top: 80px; /* Account for mobile navigation */
    }

    .banner-spacing {
        margin-bottom: 40px;
        height: 10px;
    }

    .banner-title {
        font-size: 2rem;
    }

    .banner-subtitle {
        font-size: 1.2rem;
    }

    .stat-number {
        font-size: 1.8rem;
    }

    .banner-stats {
        gap: 15px;
    }

    .stat-item {
        min-width: 80px;
    }
}

.section-title {
    margin-bottom: 80px;
}

.section-title h2 {
    color: #1e293b;
    margin-bottom: 20px;
}

/* Feature cards styling */
.features {
    padding: 100px 0;
    background: white;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin-bottom: 60px;
}

@media (max-width: 768px) {
    .features-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}

.feature-card {
    background: #f8fafc;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: #667eea;
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    font-size: 2rem;
    color: white;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1);
}

.feature-card h3 {
    font-size: 1.5rem;
    color: #1e293b;
    margin-bottom: 15px;
    font-weight: 600;
}

.feature-card p {
    color: #64748b;
    line-height: 1.8;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* App Badge Animation */
.company-badge {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(255, 187, 36, 0.4);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(255, 187, 36, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(255, 187, 36, 0);
    }
}

/* Parallax effect for banner */
.app-banner {
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
}

@media (max-width: 768px) {
    .app-banner {
        background-attachment: scroll;
    }
}
</style>
@endpush

@push('styles')
<style>
/* Fix navigation bar issues on SLDRC page */
body.sldrc-page .modern-navbar {
    /* Prevent navigation color changes */
    background: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(20px) !important;
    -webkit-backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.1) !important;
    box-shadow: 0 4px 32px rgba(0, 0, 0, 0.1) !important;

    /* Prevent size increases and maintain fixed dimensions */
    height: 70px !important;
    padding: 8px 0 !important;
    width: 100% !important;
    max-width: 100vw !important;
    left: 0 !important;
    right: 0 !important;
    overflow: visible !important;

    /* Ensure proper z-index hierarchy */
    z-index: 9999 !important;
    position: fixed !important;
    top: 0 !important;
    box-sizing: border-box !important;
}

body.sldrc-page .modern-navbar.scrolled {
    background: rgba(255, 255, 255, 0.98) !important;
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15) !important;
    border-bottom-color: rgba(37, 99, 235, 0.2) !important;
}

/* Fix navigation container to prevent overflow */
body.sldrc-page .nav-container {
    max-width: 100% !important;
    width: 100% !important;
    margin: 0 !important;
    padding: 0 1rem !important;
    height: 70px !important;
    overflow: visible !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    box-sizing: border-box !important;
}

/* Prevent auth buttons from going off-screen */
body.sldrc-page .nav-actions {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    flex-shrink: 0 !important;
    min-width: auto !important;
    overflow: visible !important;
}

body.sldrc-page .auth-buttons {
    display: flex !important;
    align-items: center !important;
    gap: 6px !important;
    flex-wrap: nowrap !important;
    min-width: auto !important;
    overflow: visible !important;
    margin-right: 0 !important;
}

body.sldrc-page .btn-auth {
    padding: 6px 12px !important;
    font-size: 0.8rem !important;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
    border-radius: 6px !important;
}

/* Fix navigation menu positioning */
body.sldrc-page .nav-menu {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex: 1 !important;
    max-width: none !important;
    overflow: visible !important;
}

body.sldrc-page .nav-items {
    display: flex !important;
    align-items: center !important;
    gap: 0.5rem !important;
    flex-wrap: nowrap !important;
    overflow: visible !important;
}

body.sldrc-page .nav-link {
    padding: 8px 12px !important;
    font-size: 0.85rem !important;
    white-space: nowrap !important;
}

/* Override main content margins for SLDRC page */
body.sldrc-page main {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

/* Fix body positioning */
body.sldrc-page {
    padding-top: 0 !important;
    margin-top: 0 !important;
    overflow-x: hidden !important;
}

/* ========== MOBILE NAVIGATION FIXES ========== */
/* Prevent duplicate elements in mobile navigation */
body.sldrc-page .mobile-nav-overlay .mobile-nav-header .mobile-brand {
    /* Ensure logo appears only once */
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}

body.sldrc-page .mobile-nav-overlay .mobile-nav-header .mobile-brand img {
    /* Prevent logo duplication */
    display: block !important;
    width: auto !important;
    height: 32px !important;
}

body.sldrc-page .mobile-auth-section {
    /* Ensure auth buttons appear only once */
    padding: 20px 24px 24px !important;
    border-top: 1px solid rgba(37, 99, 235, 0.1) !important;
    background: rgba(37, 99, 235, 0.02) !important;
    width: 100% !important;
    box-sizing: border-box !important;
    margin-top: auto !important;
    flex-shrink: 0 !important;
}

body.sldrc-page .mobile-auth-btn {
    /* Prevent button duplication */
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    padding: 12px 20px !important;
    border-radius: 8px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}

body.sldrc-page .mobile-auth-btn.login {
    color: var(--primary-blue) !important;
    border: 2px solid var(--primary-blue) !important;
    background: transparent !important;
}

body.sldrc-page .mobile-auth-btn.register {
    color: white !important;
    background: linear-gradient(135deg, var(--primary-blue), var(--accent-color)) !important;
    border: 2px solid transparent !important;
}

/* Ensure mobile navigation content doesn't duplicate */
body.sldrc-page .mobile-nav-content {
    background: rgba(255, 255, 255, 0.98) !important;
    backdrop-filter: blur(20px) !important;
    -webkit-backdrop-filter: blur(20px) !important;
}

/* Ensure mobile navigation items have correct colors */
body.sldrc-page .mobile-nav-item {
    color: var(--text-dark) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.05) !important;
}

body.sldrc-page .mobile-nav-item svg {
    color: var(--primary-blue) !important;
}

body.sldrc-page .mobile-nav-item:hover,
body.sldrc-page .mobile-nav-item.active {
    background: rgba(37, 99, 235, 0.05) !important;
    color: var(--primary-blue) !important;
}

/* Mobile navigation header styling */
body.sldrc-page .mobile-nav-header {
    background: rgba(37, 99, 235, 0.02) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.1) !important;
}

body.sldrc-page .mobile-brand span {
    color: var(--text-dark) !important;
    font-weight: 600 !important;
}

/* Fix mobile menu positioning and z-index */
body.sldrc-page .mobile-nav-overlay {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    z-index: 99999 !important; /* Higher than navbar */
    background: rgba(0, 0, 0, 0.8) !important;
    backdrop-filter: blur(8px) !important;
}

/* Prevent SLDRC page styles from affecting mobile toggle */
body.sldrc-page .mobile-toggle {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 40px !important;
    height: 40px !important;
    cursor: pointer !important;
    z-index: 10000 !important;
}

body.sldrc-page .hamburger {
    display: flex !important;
    flex-direction: column !important;
    gap: 4px !important;
}

body.sldrc-page .hamburger span {
    display: block !important;
    width: 20px !important;
    height: 2px !important;
    background: var(--primary-blue) !important;
    transition: all 0.3s ease !important;
}

/* Mobile navigation group styling */
body.sldrc-page .mobile-nav-group-header {
    color: var(--text-dark) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.05) !important;
}

body.sldrc-page .mobile-nav-group-header svg {
    color: var(--primary-blue) !important;
}

body.sldrc-page .mobile-nav-subitem {
    color: var(--text-light) !important;
    background: rgba(37, 99, 235, 0.02) !important;
}

body.sldrc-page .mobile-nav-subitem:hover {
    background: rgba(37, 99, 235, 0.05) !important;
    color: var(--primary-blue) !important;
}

/* Mobile responsiveness improvements */
@media (max-width: 768px) {
    body.sldrc-page .modern-navbar {
        padding: 8px 16px !important;
    }

    body.sldrc-page .nav-container {
        padding: 0 !important;
    }

    body.sldrc-page .mobile-nav-menu {
        padding: 20px !important;
        max-height: calc(100vh - 80px) !important;
        overflow-y: auto !important;
    }

    /* Hide desktop navigation elements on mobile to prevent duplication */
    body.sldrc-page .nav-menu {
        display: none !important;
    }

    body.sldrc-page .nav-actions {
        display: none !important;
    }

    body.sldrc-page .auth-buttons {
        display: none !important;
    }

    /* Ensure mobile toggle is visible */
    body.sldrc-page .mobile-toggle {
        display: flex !important;
    }
}

@media (min-width: 769px) {
    /* Hide mobile navigation on desktop */
    body.sldrc-page .mobile-nav-overlay {
        display: none !important;
    }

    body.sldrc-page .mobile-toggle {
        display: none !important;
    }
}

/* Ensure proper section spacing */
body.sldrc-page .features,
body.sldrc-page .benefits,
body.sldrc-page .tech-stack {
    padding: 80px 0 !important;
}

/* Fix screenshot carousel positioning */
body.sldrc-page .screenshots-gallery {
    padding: 80px 0 !important;
    overflow: hidden !important;
}

/* Ensure banner is properly positioned without interfering with navigation */
body.sldrc-page .app-banner {
    margin-top: 0 !important;
    position: relative;
    z-index: 1 !important; /* Lower than navigation */
    padding-top: 90px !important; /* Add padding to account for navigation */
    min-height: calc(100vh - 20px) !important;
    display: flex !important;
    align-items: center !important;
}

/* Ensure no top spacing on the page */
body.sldrc-page {
    padding-top: 0 !important;
}

/* Responsive navigation fixes */
@media (max-width: 1200px) {
    body.sldrc-page .nav-container {
        padding: 0 1.5rem !important;
    }

    body.sldrc-page .nav-menu {
        gap: 0.25rem !important;
    }

    body.sldrc-page .nav-link {
        padding: 10px 12px !important;
        font-size: 0.9rem !important;
    }
}

@media (max-width: 1024px) {
    body.sldrc-page .modern-navbar {
        height: 60px !important;
        padding: 10px 16px !important;
    }

    body.sldrc-page .nav-container {
        height: 60px !important;
        padding: 0 1rem !important;
    }

    body.sldrc-page .app-banner {
        margin-top: -60px !important;
        padding-top: 60px !important;
    }
}

@media (max-width: 768px) {
    body.sldrc-page .modern-navbar {
        padding: 8px 0 !important;
        height: 65px !important;
    }

    body.sldrc-page .nav-container {
        height: 65px !important;
        padding: 0 0.75rem !important;
        width: 100% !important;
    }

    body.sldrc-page .app-banner {
        padding-top: 85px !important;
        margin-top: 0 !important;
    }

    body.sldrc-page .nav-menu {
        display: none !important;
    }

    body.sldrc-page .mobile-toggle {
        display: flex !important;
    }
}@media (max-width: 576px) {
    body.sldrc-page .modern-navbar {
        padding: 8px 0 !important;
        height: 60px !important;
    }

    body.sldrc-page .nav-container {
        height: 60px !important;
        padding: 0 0.5rem !important;
        width: 100% !important;
    }

    body.sldrc-page .app-banner {
        padding-top: 80px !important;
        margin-top: 0 !important;
    }

    body.sldrc-page .btn-auth {
        padding: 4px 8px !important;
        font-size: 0.75rem !important;
    }

    body.sldrc-page .nav-link {
        padding: 6px 8px !important;
        font-size: 0.8rem !important;
    }

    body.sldrc-page .brand-text {
        font-size: 1.2rem !important;
    }
}\n\n/* Force the banner to be properly positioned */
body.sldrc-page .app-banner {
    display: block !important;
    order: -1;
}
</style>
@endpush

@endsection
