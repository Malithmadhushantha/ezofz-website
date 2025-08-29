@extends('layouts.app')

@section('title', 'Name to Initials Converter - Coming Soon | EZofz.lk')
@section('description', 'Name to Initials Converter is coming soon to EZofz.lk. An efficient tool for converting full names to initials format.')
@section('keywords', 'name converter, initials converter, name to initials, sri lanka, conversion tool')

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

    .tech-hexagon {
        position: absolute;
        width: 100px;
        height: 115.47px;
        background-color: rgba(0, 214, 255, 0.05);
        clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .coming-soon-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 3.5rem;
        color: var(--tech-cyan);
        text-align: center;
        margin-bottom: 1.5rem;
        text-shadow: 0 0 10px var(--tech-cyan);
        animation: flicker 2s linear infinite;
    }

    @keyframes flicker {
        0%, 19.999%, 22%, 62.999%, 64%, 64.999%, 70%, 100% {
            opacity: 1;
            text-shadow: 0 0 10px var(--tech-cyan),
                         0 0 20px var(--tech-cyan),
                         0 0 40px var(--tech-cyan);
        }
        20%, 21.999%, 63%, 63.999%, 65%, 69.999% {
            opacity: 0.4;
            text-shadow: none;
        }
    }

    .coming-soon-subtitle {
        font-family: 'Rajdhani', sans-serif;
        font-size: 1.5rem;
        color: #e0e0e0;
        text-align: center;
        margin-bottom: 2rem;
        opacity: 0.8;
    }

    .tech-scanner {
        width: 200px;
        height: 4px;
        background: var(--tech-cyan);
        position: relative;
        margin: 2rem 0;
        animation: scan 2s ease-in-out infinite;
    }

    @keyframes scan {
        0%, 100% {
            transform: translateY(-50px);
            opacity: 0;
        }
        50% {
            transform: translateY(50px);
            opacity: 1;
        }
    }

    .matrix-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .matrix-column {
        position: absolute;
        top: -100%;
        width: 1px;
        height: 100%;
        background: linear-gradient(transparent, var(--tech-cyan), transparent);
        animation: matrix-fall 20s infinite;
        opacity: 0.1;
    }

    @keyframes matrix-fall {
        0% {
            transform: translateY(-100%);
        }
        100% {
            transform: translateY(200%);
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
    <div class="matrix-bg">
        @for ($i = 0; $i < 20; $i++)
            <div class="matrix-column" style="left: {{ 5 * $i }}%; animation-delay: {{ $i * 0.5 }}s"></div>
        @endfor
    </div>

    <div class="tech-hexagon" style="transform: scale(1)"></div>
    <div class="tech-hexagon" style="transform: scale(2)"></div>
    <div class="tech-hexagon" style="transform: scale(3)"></div>

    <h1 class="coming-soon-title">Name to Initials</h1>
    <p class="coming-soon-subtitle">Transform your name format with precision</p>
    <div class="tech-scanner"></div>
</div>
@endsection
