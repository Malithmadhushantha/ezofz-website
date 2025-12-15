@extends('layouts.app')

@section('title', 'EZofz.lk - Advanced Office Tools for Sri Lankan Officers')
@section('description', 'Streamline your office work with our advanced tools including Sinhala unicode typing, name converters, and document downloads for Sri Lankan public and private sector officers.')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --dark-bg: #0f1419;
        --card-bg: rgba(255, 255, 255, 0.95);
        --text-light: #8892b0;
        --border-color: rgba(255, 255, 255, 0.1);
        --tech-blue: #667eea;
        --tech-purple: #764ba2;
    }

    body {
        background: #ffffff !important;
        min-height: 100vh;
        position: relative;
        color: #2d3748 !important;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .hero-section {
        padding: 120px 0 !important;
        position: relative;
        overflow: hidden;
        min-height: 100vh !important;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.1);
        pointer-events: none;
        z-index: 1;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(0deg, transparent 0%, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 60px 60px;
        opacity: 0.3;
        animation: heroGrid 25s linear infinite;
        pointer-events: none;
        z-index: 2;
    }

    @keyframes heroGrid {
        0% { transform: translate(0, 0); }
        100% { transform: translate(60px, 60px); }
    }

    .hero-content {
        position: relative;
        z-index: 10;
        text-align: center;
        color: white;
        padding: 2rem 0;
    }

    .hero-title {
        font-size: 4rem !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        margin-bottom: 1.5rem !important;
        line-height: 1.1 !important;
        letter-spacing: -0.02em !important;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
    }

    .hero-subtitle {
        font-size: 1.4rem;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 3rem;
        font-weight: 400;
        line-height: 1.6;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .hero-section .hero-stats {
        display: flex !important;
        justify-content: center;
        gap: 3rem;
        margin: 2rem 0 !important;
        flex-wrap: wrap;
    }

    .hero-section .hero-stat {
        text-align: center;
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .hero-section .hero-stat-number {
        font-size: 2rem !important;
        font-weight: 700 !important;
        color: #ffffff !important;
        display: block;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3) !important;
    }

    .hero-section .hero-stat-label {
        font-size: 0.9rem !important;
        color: rgba(255, 255, 255, 0.85) !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .hero-image {
        position: relative;
        transition: all 0.6s ease;
        filter: drop-shadow(0 25px 50px rgba(0, 0, 0, 0.3));
        border-radius: 20px;
        overflow: hidden;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1rem;
    }

    .hero-image:hover {
        transform: translateY(-10px) scale(1.02);
        filter: drop-shadow(0 35px 60px rgba(59, 130, 246, 0.2));
    }

    .hero-image img {
        border-radius: 15px;
        width: 100%;
        height: auto;
    }

    .tools-section {
        padding: 100px 0;
        background: #f8fafc;
        border-top: 1px solid rgba(102, 126, 234, 0.1);
        border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        position: relative;
        overflow: hidden;
    }

    .tools-section::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, rgba(64, 224, 208, 0.6) 50%, transparent 100%);
        animation: toolsLine 4s ease-in-out infinite;
    }

    @keyframes toolsLine {
        0%, 100% {
            transform: translateX(-100%);
            opacity: 0;
        }
        50% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #2d3748;
        text-align: center;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        color: #718096;
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 4rem;
        font-weight: 300;
    }

    .tool-card {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        padding: 1.5rem;
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .tool-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .tool-card:hover::before {
        transform: scaleX(1);
    }

    .tool-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .tool-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .tool-icon::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: inherit;
        opacity: 0.1;
        border-radius: 50%;
    }

    .tool-card:hover .tool-icon {
        transform: scale(1.05) rotate(3deg);
    }

    .tool-icon.primary { background: var(--primary-gradient); }
    .tool-icon.success { background: var(--success-gradient); }
    .tool-icon.warning { background: var(--warning-gradient); }

    .tool-card h4 {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.8rem;
        font-size: 1.2rem;
        text-align: center;
    }

    .tool-card p {
        color: #718096;
        line-height: 1.5;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
        text-align: center;
    }

    .tool-btn {
        padding: 10px 20px;
        border-radius: 50px;
        border: none;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        width: 100%;
        font-size: 0.95rem;
    }

    .tool-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tool-btn:hover::before {
        left: 100%;
    }

    .tool-btn.primary {
        background: var(--primary-gradient);
        color: white;
    }

    .tool-btn.success {
        background: var(--success-gradient);
        color: white;
    }

    .tool-btn.warning {
        background: var(--warning-gradient);
        color: white;
    }

    .features-section {
        padding: 100px 0;
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .features-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(135deg, transparent 0%, rgba(102, 126, 234, 0.05) 50%, transparent 100%),
            linear-gradient(-45deg, transparent 0%, rgba(64, 224, 208, 0.05) 50%, transparent 100%);
        background-size: 300px 300px, 400px 400px;
        animation: featuresBg 8s ease-in-out infinite;
    }

    @keyframes featuresBg {
        0%, 100% {
            background-position: 0% 0%, 100% 100%;
        }
        50% {
            background-position: 100% 100%, 0% 0%;
        }
    }

    .feature-image {
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        transition: transform 0.4s ease;
    }

    .feature-image:hover {
        transform: scale(1.02);
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 15px;
        border: 1px solid rgba(102, 126, 234, 0.1);
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        background: #f1f5f9;
        transform: translateX(10px);
        border-color: rgba(102, 126, 234, 0.2);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        flex-shrink: 0;
    }

    .feature-content h5 {
        color: #2d3748;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .feature-content p {
        color: #718096;
        margin: 0;
        line-height: 1.6;
    }

    .cta-section {
        padding: 100px 0;
        background: var(--primary-gradient);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
    }

    .cta-section::after {
        content: '';
        position: absolute;
        top: 20%;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.6) 50%, transparent 100%);
        animation: ctaLine 3s ease-in-out infinite;
    }

    @keyframes ctaLine {
        0%, 100% {
            transform: translateX(-100%);
            opacity: 0;
        }
        50% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .cta-btn {
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        margin: 0 10px;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 15; /* Ensure it's above other elements */
        cursor: pointer;
    }

    .cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .ad-section {
        margin: 4rem 0;
        padding: 2rem;
    }

    .ad-placeholder {
        background: #f8fafc;
        border-radius: 15px;
        padding: 3rem;
        text-align: center;
        border: 2px dashed rgba(102, 126, 234, 0.2);
        transition: all 0.3s ease;
        color: #718096;
    }

    .ad-placeholder:hover {
        border-color: rgba(102, 126, 234, 0.3);
        background: #f1f5f9;
    }

    .ad-placeholder i {
        color: #667eea !important;
    }

    .ad-placeholder p {
        color: #718096 !important;
    }

    /* Animation Classes */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .floating {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.5); }
        50% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.8); }
    }

    .glow-pulse {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    /* Library Section Styles */
    .library-section {
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        position: relative;
    }

    .library-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(102, 126, 234, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(118, 75, 162, 0.03) 0%, transparent 50%);
        pointer-events: none;
    }

    .library-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 2.5rem;
        height: 100%;
        border: 1px solid rgba(102, 126, 234, 0.1);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .library-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.05), transparent);
        transition: left 0.6s ease;
    }

    .library-card:hover {
        transform: translateY(-10px);
        border-color: rgba(102, 126, 234, 0.3);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .library-card:hover::before {
        left: 100%;
    }

    .library-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: white;
        transition: all 0.3s ease;
    }

    .library-card:hover .library-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .penal-code-icon {
        background: linear-gradient(135deg, #667eea, #764ba2);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .cpc-icon {
        background: linear-gradient(135deg, #f093fb, #f5576c);
        box-shadow: 0 8px 20px rgba(240, 147, 251, 0.3);
    }

    .police-icon {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        box-shadow: 0 8px 20px rgba(79, 172, 254, 0.3);
    }

    .library-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1rem;
        text-align: center;
    }

    .library-card p {
        color: #718096;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: 0.95rem;
    }

    .library-features {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0;
    }

    .library-features li {
        color: #4a5568;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        font-size: 0.9rem;
    }

    .library-features i {
        color: #48bb78;
        margin-right: 0.75rem;
        font-size: 1rem;
    }

    .library-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, var(--tech-blue), var(--tech-purple));
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
        position: relative;
        overflow: hidden;
    }

    .library-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .library-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .library-btn:hover::before {
        left: 100%;
    }

    .library-btn i {
        transition: transform 0.3s ease;
    }

    .library-btn:hover i {
        transform: translateX(5px);
    }

    /* Important Links Section Styles */
    .important-links-section {
        padding: 100px 0;
        background: #f8fafc;
        position: relative;
        overflow: hidden;
    }

    .important-links-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 10% 20%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(138, 43, 226, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .sl-flag {
        display: inline-block;
        position: relative;
    }

    .flag-icon {
        font-size: 3rem;
        animation: flagWave 3s ease-in-out infinite;
        display: inline-block;
        filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
    }

    @keyframes flagWave {
        0%, 100% { transform: rotate(-5deg); }
        50% { transform: rotate(5deg); }
    }

    .links-tab-container {
        background: #ffffff;
        padding: 10px;
        border-radius: 50px;
        display: inline-flex;
        margin: 0 auto 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .links-tab-container .nav-link {
        color: #718096;
        border-radius: 50px;
        padding: 10px 20px;
        margin: 0 5px;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .links-tab-container .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .links-tab-container .nav-link:hover::before {
        left: 100%;
    }

    .links-tab-container .nav-link.active {
        background: linear-gradient(135deg, var(--tech-blue), var(--tech-purple));
        color: white;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .link-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1.2rem 0.8rem;
        background: #ffffff;
        border-radius: 12px;
        height: 100%;
        text-decoration: none;
        color: #2d3748;
        transition: all 0.3s ease;
        border: 1px solid rgba(102, 126, 234, 0.1);
        position: relative;
        overflow: hidden;
        max-width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    }

    .link-card::before {
        content: '';
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(102, 126, 234, 0.05), transparent);
        transition: all 0.5s ease;
    }

    .link-card:hover {
        transform: translateY(-5px);
        border-color: rgba(102, 126, 234, 0.3);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        color: #2d3748;
    }

    .link-card:hover::before {
        top: 0;
    }

    .link-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.8rem;
        transition: all 0.3s ease;
        font-size: 1.4rem;
        color: white;
    }    .link-card:hover .link-icon {
        transform: scale(1.05);
    }

    .forces-icon {
        background: linear-gradient(135deg, #1a237e, #283593);
        box-shadow: 0 3px 8px rgba(26, 35, 126, 0.5);
    }

    .police-icon {
        background: linear-gradient(135deg, #004d40, #00695c);
        box-shadow: 0 3px 8px rgba(0, 77, 64, 0.5);
    }

    .govt-icon {
        background: linear-gradient(135deg, #e65100, #f57c00);
        box-shadow: 0 3px 8px rgba(230, 81, 0, 0.5);
    }

    .law-icon {
        background: linear-gradient(135deg, #4a148c, #6a1b9a);
        box-shadow: 0 3px 8px rgba(74, 20, 140, 0.5);
    }

    .link-card h5 {
        text-align: center;
        margin-bottom: 0.3rem;
        font-weight: 600;
        color: #2d3748;
        font-size: 0.95rem;
    }

    .link-url {
        font-size: 0.75rem;
        color: #a0aec0;
        margin-top: auto;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .library-card {
            padding: 2rem;
        }

        .library-icon {
            width: 70px;
            height: 70px;
            font-size: 2rem;
        }

        .library-card h3 {
            font-size: 1.3rem;
        }

        .library-features li {
            font-size: 0.85rem;
        }

        .hero-section {
            padding: 80px 0;
            min-height: auto;
        }

        .hero-title {
            font-size: 2.8rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .hero-stats {
            gap: 2rem;
            margin: 1.5rem 0;
        }

        .hero-stat-number {
            font-size: 1.5rem;
        }

        .hero-stat-label {
            font-size: 0.8rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .hero-image {
            transform: none;
            max-width: 90%;
            margin: 2rem auto 0;
            padding: 0.75rem;
        }

        .hero-content {
            text-align: center;
            padding: 1rem 0;
        }

        .feature-item {
            flex-direction: column;
            text-align: center;
        }

        .feature-icon {
            margin: 0 auto 1rem;
        }

        .tool-card {
            padding: 1.2rem 1rem;
        }

        .tool-icon {
            width: 55px;
            height: 55px;
            margin-bottom: 1rem;
        }

        .tool-card h4 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .tool-card p {
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }

        .tool-btn {
            padding: 8px 15px;
            font-size: 0.85rem;
        }

        .links-tab-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            border-radius: 10px;
            padding: 3px;
        }

        .links-tab-container .nav-link {
            margin: 3px;
            font-size: 0.8rem;
            padding: 6px 12px;
        }

        .link-card {
            padding: 0.8rem 0.5rem;
        }

        .link-icon {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
            margin-bottom: 0.6rem;
        }

        .link-card h5 {
            font-size: 0.85rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Structured Data for SEO -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebSite",
  "name": "EZofz.lk",
  "alternateName": "EZofz - Office Tools for Sri Lankan Officers",
  "url": "{{ url('/') }}",
  "description": "Advanced office tools and services for Sri Lankan public and private sector officers including Sinhala unicode typing, name converters, document downloads, and legal reference libraries.",
  "potentialAction": {
    "@@type": "SearchAction",
    "target": {
      "@@type": "EntryPoint",
      "urlTemplate": "{{ url('/') }}?search={search_term_string}"
    },
    "query-input": "required name=search_term_string"
  },
  "publisher": {
    "@@type": "Organization",
    "name": "EZofz Technology Solutions",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('images/logo.png') }}"
    }
  },
  "inLanguage": ["en-LK", "si-LK"],
  "about": [
    {
      "@@type": "Thing",
      "name": "Legal Reference Tools",
      "description": "Digital library of Sri Lankan legal codes including Penal Code and Criminal Procedure Code"
    },
    {
      "@@type": "Thing",
      "name": "Office Productivity Tools",
      "description": "Sinhala unicode typing, name converters, and ID card verification tools"
    },
    {
      "@@type": "Thing",
      "name": "Police Resources",
      "description": "Police directory and document downloads for law enforcement"
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "ItemList",
  "name": "Office Tools and Services",
  "description": "Comprehensive list of tools and services available on EZofz.lk",
  "itemListElement": [
    {
      "@@type": "ListItem",
      "position": 1,
      "item": {
        "@@type": "SoftwareApplication",
        "name": "Sinhala Unicode Typing Tool",
        "url": "{{ route('tools.unicode-typing') }}",
        "description": "Convert between Sinhala unicode and FM fonts",
        "applicationCategory": "UtilitiesApplication",
        "operatingSystem": "Web Browser",
        "offers": {
          "@@type": "Offer",
          "price": "0",
          "priceCurrency": "LKR"
        }
      }
    },
    {
      "@@type": "ListItem",
      "position": 2,
      "item": {
        "@@type": "SoftwareApplication",
        "name": "Name Converter Tool",
        "url": "{{ route('tools.name-converter') }}",
        "description": "Convert full names to initials with surname",
        "applicationCategory": "UtilitiesApplication",
        "operatingSystem": "Web Browser",
        "offers": {
          "@@type": "Offer",
          "price": "0",
          "priceCurrency": "LKR"
        }
      }
    },
    {
      "@@type": "ListItem",
      "position": 3,
      "item": {
        "@@type": "WebPage",
        "name": "Penal Code Library",
        "url": "{{ route('penal-code.public') }}",
        "description": "Complete Sri Lankan Penal Code with searchable sections and amendments"
      }
    },
    {
      "@@type": "ListItem",
      "position": 4,
      "item": {
        "@@type": "WebPage",
        "name": "Criminal Procedure Code",
        "url": "{{ route('criminal-procedure-code.public') }}",
        "description": "Sri Lankan Criminal Procedure Code reference library"
      }
    },
    {
      "@@type": "ListItem",
      "position": 5,
      "item": {
        "@@type": "WebPage",
        "name": "Police Directory",
        "url": "{{ route('police.directory') }}",
        "description": "Complete directory of police stations in Sri Lanka"
      }
    },
    {
      "@@type": "ListItem",
      "position": 6,
      "item": {
        "@@type": "WebPage",
        "name": "Law Documents Downloads",
        "url": "{{ route('documents.law') }}",
        "description": "Legal forms and documents for download"
      }
    },
    {
      "@@type": "ListItem",
      "position": 7,
      "item": {
        "@@type": "WebPage",
        "name": "Police Documents Downloads",
        "url": "{{ route('documents.police') }}",
        "description": "Official police forms and documents"
      }
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "EZofz Technology Solutions",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "sameAs": [
    "https://www.facebook.com/ezofz",
    "https://twitter.com/ezofz"
  ],
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "+94-70-779-3037",
    "contactType": "Customer Service",
    "areaServed": "LK",
    "availableLanguage": ["English", "Sinhala"]
  },
  "address": {
    "@@type": "PostalAddress",
    "addressCountry": "LK",
    "addressRegion": "Sri Lanka"
  }
}
</script>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content">
                    <div class="mb-3">
                        <span class="badge bg-primary bg-gradient px-3 py-2 rounded-pill mb-3">
                            <i class="bi bi-lightning-fill me-2"></i>Trusted by 10,000+ Officers
                        </span>
                    </div>
                    <h1 class="hero-title">Professional Office Tools for Sri Lankan Officers</h1>
                    <p class="hero-subtitle">Streamline your daily office tasks with our comprehensive suite of tools - from Sinhala unicode typing to official document processing, designed specifically for Sri Lankan public and private sector professionals.</p>

                    <!-- Hero Stats -->
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <span class="hero-stat-number">50K+</span>
                            <span class="hero-stat-label">Documents Processed</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-number">15+</span>
                            <span class="hero-stat-label">Professional Tools</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-number">99.9%</span>
                            <span class="hero-stat-label">Uptime</span>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start mt-4">
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 py-3">
                                <i class="bi bi-rocket-takeoff me-2"></i>Start Free Today
                            </a>
                            <a href="#tools" class="btn btn-outline-light btn-lg px-4 py-3">
                                <i class="bi bi-eye me-2"></i>View Tools
                            </a>
                        @else
                            <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}" class="btn btn-primary btn-lg px-4 py-3">
                                <i class="bi bi-speedometer2 me-2"></i>Access Dashboard
                            </a>
                            <a href="#tools" class="btn btn-outline-light btn-lg px-4 py-3">
                                <i class="bi bi-tools me-2"></i>Browse Tools
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="text-center mt-5 mt-lg-0">
                    <div class="hero-image">
                        <img src="{{ asset('images/banner_image.png') }}" alt="Professional Office Tools for Sri Lankan Officers" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section id="tools" class="tools-section">
    <div class="container">
        <div data-aos="fade-up">
            <h2 class="section-title">Powerful Tools at Your Fingertips</h2>
            <p class="section-subtitle">Enhance your productivity with our professionally crafted tools</p>
        </div>

        <div class="row g-3">
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <div class="tool-card">
                    <div class="tool-icon primary">
                        <i class="bi bi-keyboard fs-2 text-white"></i>
                    </div>
                    <h4>Sinhala Unicode Typing</h4>
                    <p>Type in Sinhala with intelligent prediction and auto-correction capabilities.</p>
                    <a href="{{ route('tools.unicode-typing') }}" class="tool-btn primary" aria-label="Try Sinhala Unicode Typing Tool">
                        <i class="bi bi-arrow-right me-2"></i>Try Now
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="tool-card">
                    <div class="tool-icon success">
                        <i class="bi bi-person-badge fs-2 text-white"></i>
                    </div>
                    <h4>Name Converter</h4>
                    <p>Convert full names to initials format for Sri Lankan official documents.</p>
                    <a href="{{ route('tools.name-converter') }}" class="tool-btn success" aria-label="Try Name Converter Tool">
                        <i class="bi bi-arrow-right me-2"></i>Convert Now
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                <div class="tool-card">
                    <div class="tool-icon primary">
                        <i class="bi bi-card-text fs-2 text-white"></i>
                    </div>
                    <h4>Identity Card Details</h4>
                    <p>Sri Lankan Identity Card Details and Identity Card Number Converter.</p>
                    <a href="{{ route('tools.sl-idcard-details') }}" class="tool-btn primary" aria-label="Access Identity Card Details Tool">
                        <i class="bi bi-arrow-right me-2"></i>Access Now
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="tool-card">
                    <div class="tool-icon warning">
                        <i class="bi bi-download fs-2 text-white"></i>
                    </div>
                    <h4>Document Downloads</h4>
                    <p>Access law documents, police forms, and other essential documents.</p>
                    <a href="{{ route('documents.index') }}" class="tool-btn warning" aria-label="Browse Document Downloads">
                        <i class="bi bi-arrow-right me-2"></i>Browse Downloads
                    </a>
                </div>
            </div>


        </div>
    </div>
</section>

<!-- SLDRC App Showcase Section -->
<section class="sldrc-app-section" style="padding: 100px 0; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); position: relative; overflow: hidden;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="app-info">
                    <div class="app-badge" style="display: inline-block; background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 8px 20px; border-radius: 50px; font-size: 0.9rem; font-weight: 600; margin-bottom: 2rem;">
                        <i class="bi bi-phone me-2"></i>Mobile Application
                    </div>
                    <h2 class="section-title text-start mb-4">SLDRC App - Digital Vehicle Management</h2>
                    <p class="lead mb-4" style="color: #64748b; font-size: 1.2rem; line-height: 1.7;">
                        Transform your vehicle record-keeping with our comprehensive digital solution designed specifically for Sri Lankan drivers.
                        Manage trips, track fuel consumption, monitor service schedules, and maintain complete vehicle records - all in one professional mobile application.
                    </p>

                    <div class="app-features mb-4">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="feature-point d-flex align-items-center">
                                    <div class="feature-icon-sm" style="width: 40px; height: 40px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <i class="bi bi-check2 text-white"></i>
                                    </div>
                                    <span style="color: #374151; font-weight: 500;">Trip Management</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-point d-flex align-items-center">
                                    <div class="feature-icon-sm" style="width: 40px; height: 40px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <i class="bi bi-check2 text-white"></i>
                                    </div>
                                    <span style="color: #374151; font-weight: 500;">Fuel Tracking</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-point d-flex align-items-center">
                                    <div class="feature-icon-sm" style="width: 40px; height: 40px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <i class="bi bi-check2 text-white"></i>
                                    </div>
                                    <span style="color: #374151; font-weight: 500;">Service Management</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-point d-flex align-items-center">
                                    <div class="feature-icon-sm" style="width: 40px; height: 40px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <i class="bi bi-check2 text-white"></i>
                                    </div>
                                    <span style="color: #374151; font-weight: 500;">Bilingual Support</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="app-actions">
                        <a href="{{ route('sldrc.app') }}" class="btn btn-primary btn-lg me-3 mb-2" style="background: linear-gradient(135deg, #667eea, #764ba2); border: none; padding: 12px 30px; font-weight: 600;">
                            <i class="bi bi-eye me-2"></i>View Details
                        </a>
                        <a href="{{ asset('downloads/sldrc_app.apk') }}" download="SLDRC_App.apk" class="btn btn-outline-primary btn-lg mb-2" style="border-color: #667eea; color: #667eea; padding: 12px 30px; font-weight: 600;">
                            <i class="bi bi-download me-2"></i>Download APK
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="app-showcase text-center mt-5 mt-lg-0">
                    <div class="phone-mockup-home" style="position: relative; max-width: 300px; margin: 0 auto;">
                        <div style="width: 300px; height: 600px; background: linear-gradient(145deg, #1f2937, #374151); border-radius: 35px; padding: 20px; box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3); position: relative;">
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 25px; overflow: hidden; position: relative;">
                                <!-- Phone screen content -->
                                <div style="padding: 20px; color: white; text-align: center; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <div style="background: rgba(255, 255, 255, 0.1); border-radius: 15px; padding: 20px; margin-bottom: 20px; backdrop-filter: blur(10px);">
                                        <i class="bi bi-car-front" style="font-size: 3rem; color: #fbbf24;"></i>
                                        <h4 style="margin: 15px 0 10px; color: white; font-weight: 600;">SLDRC Dashboard</h4>
                                        <p style="margin: 0; font-size: 0.9rem; opacity: 0.9;">Vehicle Management System</p>
                                    </div>

                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; width: 100%; margin-bottom: 20px;">
                                        <div style="background: rgba(255, 255, 255, 0.15); border-radius: 10px; padding: 15px; text-align: center;">
                                            <i class="bi bi-speedometer2" style="font-size: 1.5rem; color: #fbbf24; display: block; margin-bottom: 8px;"></i>
                                            <div style="font-size: 0.8rem; font-weight: 600;">45.2 km</div>
                                            <div style="font-size: 0.7rem; opacity: 0.8;">Today</div>
                                        </div>
                                        <div style="background: rgba(255, 255, 255, 0.15); border-radius: 10px; padding: 15px; text-align: center;">
                                            <i class="bi bi-fuel-pump" style="font-size: 1.5rem; color: #fbbf24; display: block; margin-bottom: 8px;"></i>
                                            <div style="font-size: 0.8rem; font-weight: 600;">12.5 km/L</div>
                                            <div style="font-size: 0.7rem; opacity: 0.8;">Efficiency</div>
                                        </div>
                                    </div>

                                    <div style="background: #10b981; border-radius: 12px; padding: 12px 24px; color: white; font-weight: 600; font-size: 0.9rem;">
                                        <i class="bi bi-play-fill me-2"></i>Start New Trip
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('images/what_is_this_web.png') }}" alt="Features" class="img-fluid feature-image">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ps-lg-5 mt-5 mt-lg-0">
                    <h2 class="section-title text-start">Why Choose EZofz.lk?</h2>

                    <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">
                            <i class="bi bi-geo-alt-fill text-white"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Sri Lankan Focused</h5>
                            <p>Specifically designed for Sri Lankan government and private sector requirements with local expertise.</p>
                        </div>
                    </div>

                    <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-fill text-white"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Fast & Reliable</h5>
                            <p>Lightning-fast tools that work seamlessly across all devices with 99.9% uptime guarantee.</p>
                        </div>
                    </div>

                    <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check text-white"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Secure & Private</h5>
                            <p>Your data is protected with enterprise-grade security measures and encrypted connections.</p>
                        </div>
                    </div>

                    @guest
                        <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg cta-btn">
                                <i class="bi bi-person-plus me-2"></i>Join EZofz.lk Today
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h2 class="display-6 fw-bold mb-3 text-white">Ready to Streamline Your Work?</h2>
            <p class="lead mb-5 text-white opacity-90">Join thousands of Sri Lankan professionals already using EZofz.lk</p>
            @guest
                <a href="{{ route('register') }}" class="cta-btn btn btn-light btn-lg">
                    <i class="bi bi-person-plus me-2"></i>Get Started Free
                </a>
                <a href="{{ route('about') }}" class="cta-btn btn btn-outline-light btn-lg">
                    <i class="bi bi-info-circle me-2"></i>Learn More
                </a>
            @else
                <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}" class="cta-btn btn btn-light btn-lg">
                    <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                </a>
            @endguest
        </div>
    </div>
</section>

<!-- Library Resources Section -->
<section id="library" class="library-section" style="padding: 100px 0; background: #ffffff; position: relative; overflow: hidden;">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">📚 Digital Law Library</h2>
            <p class="section-subtitle">Comprehensive legal resources and reference materials for Sri Lankan officers</p>
        </div>

        <div class="row g-4">
            <!-- Penal Code Library -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="library-card">
                    <div class="library-icon penal-code-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h3>Penal Code Library</h3>
                    <p>Complete collection of Sri Lankan Penal Code sections with amendments, notes, and search functionality.</p>
                    <ul class="library-features">
                        <li><i class="bi bi-check-circle-fill"></i> All sections searchable</li>
                        <li><i class="bi bi-check-circle-fill"></i> Amendment history</li>
                        <li><i class="bi bi-check-circle-fill"></i> Personal notes (for registered users)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Bookmark sections</li>
                    </ul>
                    <a href="{{ route('penal-code.public') }}" class="library-btn">
                        <span>Browse Penal Code</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Criminal Procedure Code -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="library-card">
                    <div class="library-icon cpc-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <h3>Criminal Procedure Code</h3>
                    <p>Sri Lankan Criminal Procedure Code with detailed procedures, court processes, and legal guidelines.</p>
                    <ul class="library-features">
                        <li><i class="bi bi-check-circle-fill"></i> Complete procedures</li>
                        <li><i class="bi bi-check-circle-fill"></i> Court process guides</li>
                        <li><i class="bi bi-check-circle-fill"></i> Quick reference</li>
                        <li><i class="bi bi-check-circle-fill"></i> Advanced search</li>
                    </ul>
                    <a href="{{ route('criminal-procedure-code.public') }}" class="library-btn">
                        <span>Browse CPC</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Police Directory -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="library-card">
                    <div class="library-icon police-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3>Police Directory</h3>
                    <p>Complete directory of police stations across Sri Lanka with contact information and locations.</p>
                    <ul class="library-features">
                        <li><i class="bi bi-check-circle-fill"></i> All provinces covered</li>
                        <li><i class="bi bi-check-circle-fill"></i> Contact details</li>
                        <li><i class="bi bi-check-circle-fill"></i> Station addresses</li>
                        <li><i class="bi bi-check-circle-fill"></i> Quick search</li>
                    </ul>
                    <a href="{{ route('police.directory') }}" class="library-btn">
                        <span>View Directory</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Important Links Section -->
<section id="important-links" class="important-links-section">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Important Government Links</h2>
            <p class="section-subtitle">Quick access to essential Sri Lankan government websites and resources</p>
            <div class="sl-flag mb-3">
                <span class="flag-icon">🇱🇰</span>
            </div>
        </div>

        <!-- Tabs for categories -->
        <ul class="nav nav-pills mb-4 justify-content-center links-tab-container" id="govLinksTab" role="tablist" data-aos="fade-up">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="forces-tab" data-bs-toggle="pill" data-bs-target="#forces" type="button" role="tab" aria-controls="forces" aria-selected="true">
                    <i class="bi bi-shield me-2"></i>Forces
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="police-tab" data-bs-toggle="pill" data-bs-target="#police" type="button" role="tab" aria-controls="police" aria-selected="false">
                    <i class="bi bi-shield-lock me-2"></i>Police
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="govt-tab" data-bs-toggle="pill" data-bs-target="#govt" type="button" role="tab" aria-controls="govt" aria-selected="false">
                    <i class="bi bi-building me-2"></i>Government
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="law-tab" data-bs-toggle="pill" data-bs-target="#law" type="button" role="tab" aria-controls="law" aria-selected="false">
                    <i class="bi bi-bank me-2"></i>Law & Parliament
                </button>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="govLinksTabContent">
            <!-- Forces Links -->
            <div class="tab-pane fade show active" id="forces" role="tabpanel" aria-labelledby="forces-tab">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                        <a href="https://www.navy.lk/" target="_blank" class="link-card">
                            <div class="link-icon forces-icon">
                                <i class="bi bi-water"></i>
                            </div>
                            <h5>Sri Lanka Navy</h5>
                            <span class="link-url">www.navy.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                        <a href="https://www.army.lk/" target="_blank" class="link-card">
                            <div class="link-icon forces-icon">
                                <i class="bi bi-truck"></i>
                            </div>
                            <h5>Sri Lanka Army</h5>
                            <span class="link-url">www.army.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                        <a href="https://www.airforce.lk/" target="_blank" class="link-card">
                            <div class="link-icon forces-icon">
                                <i class="bi bi-airplane"></i>
                            </div>
                            <h5>Sri Lanka Air Force</h5>
                            <span class="link-url">www.airforce.lk</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Police Links -->
            <div class="tab-pane fade" id="police" role="tabpanel" aria-labelledby="police-tab">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                        <a href="https://www.police.lk/" target="_blank" class="link-card">
                            <div class="link-icon police-icon">
                                <i class="bi bi-shield"></i>
                            </div>
                            <h5>Sri Lanka Police</h5>
                            <span class="link-url">www.police.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                        <a href="https://npa.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon police-icon">
                                <i class="bi bi-mortarboard"></i>
                            </div>
                            <h5>National Police Academy</h5>
                            <span class="link-url">npa.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                        <a href="https://ineed.police.lk/" target="_blank" class="link-card">
                            <div class="link-icon police-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <h5>Lost Phone Police Complaint System</h5>
                            <span class="link-url">ineed.police.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                        <a href="https://eservices.police.lk/" target="_blank" class="link-card">
                            <div class="link-icon police-icon">
                                <i class="bi bi-file-earmark-check"></i>
                            </div>
                            <h5>Clearance Certificates Online</h5>
                            <span class="link-url">eservices.police.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="500">
                        <a href="https://telligp.police.lk/" target="_blank" class="link-card">
                            <div class="link-icon police-icon">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <h5>Tell Inspector General of Police (IGP)</h5>
                            <span class="link-url">telligp.police.lk</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Government Institutions -->
            <div class="tab-pane fade" id="govt" role="tabpanel" aria-labelledby="govt-tab">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                        <a href="https://www.nitf.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-shield-plus"></i>
                            </div>
                            <h5>National Insurance Trust Fund (Agrahara)</h5>
                            <span class="link-url">www.nitf.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="150">
                        <a href="https://service.pensions.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <h5>Department of Pensions</h5>
                            <span class="link-url">service.pensions.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                        <a href="https://www.immigration.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-passport"></i>
                            </div>
                            <h5>Department of Immigration and Emigration</h5>
                            <span class="link-url">www.immigration.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="250">
                        <a href="http://www.dmt.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-car-front"></i>
                            </div>
                            <h5>Department of Motor Traffic (RMV)</h5>
                            <span class="link-url">www.dmt.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                        <a href="https://www.doenets.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-journal-check"></i>
                            </div>
                            <h5>Department of Examinations</h5>
                            <span class="link-url">www.doenets.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="350">
                        <a href="https://www.ugc.ac.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-mortarboard"></i>
                            </div>
                            <h5>University Grants Commission (UGC)</h5>
                            <span class="link-url">www.ugc.ac.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                        <a href="https://moe.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <h5>Ministry of Education</h5>
                            <span class="link-url">moe.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="450">
                        <a href="https://www.labourdept.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <h5>Department of Labor</h5>
                            <span class="link-url">www.labourdept.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="500">
                        <a href="https://www.ird.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                            <h5>Inland Revenue Department (IRD)</h5>
                            <span class="link-url">www.ird.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="550">
                        <a href="https://www.cbsl.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-bank"></i>
                            </div>
                            <h5>Central Bank of Sri Lanka (CBSL)</h5>
                            <span class="link-url">www.cbsl.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="600">
                        <a href="https://ntc.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-bus-front"></i>
                            </div>
                            <h5>National Transport Commission</h5>
                            <span class="link-url">ntc.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="650">
                        <a href="https://railway.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-train-front"></i>
                            </div>
                            <h5>Sri Lanka Railways</h5>
                            <span class="link-url">railway.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="700">
                        <a href="https://www.sltda.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon govt-icon">
                                <i class="bi bi-airplane"></i>
                            </div>
                            <h5>Sri Lanka Tourism Development Authority</h5>
                            <span class="link-url">www.sltda.gov.lk</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Law & Parliament -->
            <div class="tab-pane fade" id="law" role="tabpanel" aria-labelledby="law-tab">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                        <a href="https://www.lawcom.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon law-icon">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <h5>Law Commission of Sri Lanka</h5>
                            <span class="link-url">www.lawcom.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
                        <a href="https://www.parliament.lk/" target="_blank" class="link-card">
                            <div class="link-icon law-icon">
                                <i class="bi bi-building-fill"></i>
                            </div>
                            <h5>Parliament of Sri Lanka</h5>
                            <span class="link-url">www.parliament.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
                        <a href="https://www.justiceministry.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon law-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <h5>Ministry of Justice</h5>
                            <span class="link-url">www.justiceministry.gov.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
                        <a href="http://www.supremecourt.lk/" target="_blank" class="link-card">
                            <div class="link-icon law-icon">
                                <i class="bi bi-bank2"></i>
                            </div>
                            <h5>Supreme Court of Sri Lanka</h5>
                            <span class="link-url">www.supremecourt.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="500">
                        <a href="http://www.courtofappeal.lk/" target="_blank" class="link-card">
                            <div class="link-icon law-icon">
                                <i class="bi bi-bank"></i>
                            </div>
                            <h5>Court of Appeal of Sri Lanka</h5>
                            <span class="link-url">www.courtofappeal.lk</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="600">
                        <a href="https://attorneygeneral.gov.lk/" target="_blank" class="link-card">
                            <div class="link-icon law-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <h5>Attorney General's Department</h5>
                            <span class="link-url">attorneygeneral.gov.lk</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google AdSense Banner -->
<div class="container ad-section">
    <div class="ad-placeholder" data-aos="fade-up">
        <i class="bi bi-megaphone fs-1 text-muted mb-3"></i>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6579653610544842" crossorigin="anonymous"></script>
        <!-- Display Ad 01 -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-6579653610544842"
            data-ad-slot="7573254407"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animation for elements to fade in on scroll
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.fade-in-on-scroll');
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('visible');
            }
        });
    }

    window.addEventListener('scroll', animateOnScroll);
    // Trigger once on page load
    animateOnScroll();

    // Initialize Important Links tabs
    document.addEventListener('DOMContentLoaded', function() {
        const linksTabs = document.querySelectorAll('#govLinksTab .nav-link');
        const linksContent = document.querySelectorAll('#govLinksTabContent .tab-pane');

        linksTabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all tabs and hide all content
                linksTabs.forEach(t => t.classList.remove('active'));
                linksContent.forEach(content => content.classList.remove('show', 'active'));

                // Add active class to clicked tab
                this.classList.add('active');

                // Show corresponding content
                const targetId = this.getAttribute('data-bs-target').substring(1);
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.add('show', 'active');
                }
            });
        });

        // Activate first tab by default if not already done by Bootstrap
        if (!document.querySelector('#govLinksTab .nav-link.active') && linksTabs.length > 0) {
            linksTabs[0].click();
        }
    });

    // Force apply hero styles to ensure they override layout styles
    document.addEventListener('DOMContentLoaded', function() {
        const heroSection = document.querySelector('.hero-section');
        const heroTitle = document.querySelector('.hero-title');
        const heroStats = document.querySelectorAll('.hero-stat-number');

        if (heroSection) {
            heroSection.style.background = 'linear-gradient(135deg, #0a0f1c 0%, #1a2235 50%, #0f1419 100%)';
            heroSection.style.minHeight = '100vh';
            heroSection.style.padding = '120px 0';
        }

        if (heroTitle) {
            heroTitle.style.background = 'linear-gradient(135deg, #ffffff 0%, #3b82f6 50%, #8b5cf6 100%)';
            heroTitle.style.webkitBackgroundClip = 'text';
            heroTitle.style.webkitTextFillColor = 'transparent';
            heroTitle.style.backgroundClip = 'text';
            heroTitle.style.fontSize = '4rem';
            heroTitle.style.fontWeight = '800';
        }

        heroStats.forEach(stat => {
            stat.style.color = '#3b82f6';
            stat.style.fontSize = '2rem';
            stat.style.fontWeight = '700';
        });
    });
</script>
@endsection
