@extends('layouts.app')

@section('title', 'Sinhala Unicode Typing - Coming Soon | EZofz.lk')
@section('description', 'Sinhala Unicode Typing tool is coming soon to EZofz.lk. An easy-to-use tool for typing in Sinhala Unicode.')
@section('keywords', 'sinhala typing, unicode typing, sinhala unicode, sri lanka, typing tool')

@section('content')
<style>
    .coming-soon-container {
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, var(--tech-dark), var(--tech-darker));
        position: relative;
        overflow: hidden;
    }

    .tech-circle {
        position: absolute;
        border: 2px solid var(--tech-cyan);
        border-radius: 50%;
        opacity: 0.1;
        animation: pulse-expand 4s ease-out infinite;
    }

    @keyframes pulse-expand {
        0% {
            transform: scale(0);
            opacity: 0.5;
        }
        100% {
            transform: scale(3);
            opacity: 0;
        }
    }

    .coming-soon-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 3.5rem;
        color: var(--tech-cyan);
        text-align: center;
        margin-bottom: 1.5rem;
        text-shadow: 0 0 10px var(--tech-cyan);
        animation: glitch 1s ease-in-out infinite alternate;
    }

    .coming-soon-subtitle {
        font-family: 'Rajdhani', sans-serif;
        font-size: 1.5rem;
        color: #e0e0e0;
        text-align: center;
        margin-bottom: 2rem;
        opacity: 0.8;
    }

    .tech-loading {
        width: 80px;
        height: 80px;
        position: relative;
        margin: 2rem 0;
    }

    .tech-loading::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border: 4px solid rgba(0, 214, 255, 0.1);
        border-top-color: var(--tech-cyan);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .tech-grid {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(var(--tech-cyan) 1px, transparent 1px),
                         linear-gradient(90deg, var(--tech-cyan) 1px, transparent 1px);
        background-size: 50px 50px;
        background-position: center center;
        opacity: 0.05;
        animation: grid-move 20s linear infinite;
    }

    @keyframes grid-move {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(50px);
        }
    }

    @media (max-width: 768px) {
        .coming-soon-title {
            font-size: 2rem;
        }
        .coming-soon-subtitle {
            font-size: 1.2rem;
        }
    }
</style>

<div class="coming-soon-container">
    <div class="tech-grid"></div>
    <div class="tech-circle"></div>
    <div class="tech-circle" style="animation-delay: 1s"></div>
    <div class="tech-circle" style="animation-delay: 2s"></div>

    <h1 class="coming-soon-title">Sinhala Unicode Typing</h1>
    <p class="coming-soon-subtitle">A new way to type in Sinhala is coming soon</p>
    <div class="tech-loading"></div>
</div>
@endsection
