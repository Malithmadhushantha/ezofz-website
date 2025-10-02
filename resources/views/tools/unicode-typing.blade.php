@extends('layouts.app')

@section('title', 'Sinhala Unicode Converter | EZofz.lk')
@section('description', 'Convert between Sinhala Unicode and FM/Wijesekara fonts. Real-time conversion tool for Sinhala text.')
@section('keywords', 'sinhala unicode converter, fm font, wijesekara, sinhala text conversion, unicode to fm, fm to unicode')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    /* Custom styles for the Unicode converter */
    .converter-container {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .converter-header {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 1.5rem;
    }

    .textarea-container {
        position: relative;
    }

    .text-area-label {
        position: absolute;
        top: -10px;
        left: 10px;
        background: white;
        padding: 0 10px;
        font-size: 0.85rem;
        color: #6c757d;
        border-radius: 15px;
        border: 1px solid #dee2e6;
    }

    textarea.form-control {
        resize: none;
        border: 1px solid #dee2e6;
        min-height: 200px;
        font-size: 1.1rem;
        padding: 1rem;
    }

    textarea.form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .conversion-type-toggle {
        border-radius: 30px;
        overflow: hidden;
    }

    .btn-toggle {
        border-radius: 0;
        flex: 1;
        padding: 0.75rem 0;
        font-weight: 500;
    }

    .copy-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0d6efd;
        color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        border: none;
        transition: all 0.3s ease;
    }

    .copy-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background: #0b5ed7;
    }

    .info-panel {
        background-color: #e9ecef;
        border-radius: 8px;
        padding: 15px;
    }

    .auto-detect {
        font-size: 0.9rem;
    }

    .converter-card {
        transition: all 0.3s ease;
    }

    .converter-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 1.5rem rgba(0, 0, 0, 0.2);
    }

    /* Success animation for copy */
    .copy-success {
        animation: fadeOut 2s forwards;
    }

    @keyframes fadeOut {
        0% { opacity: 1; }
        70% { opacity: 1; }
        100% { opacity: 0; }
    }

    @media (max-width: 767.98px) {
        textarea.form-control {
            min-height: 150px;
        }
    }

    /* Loading indicator styles */
    .converter.loading {
        position: relative;
    }

    .converter.loading:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.7);
        z-index: 10;
        border-radius: 10px;
    }

    .converter.loading:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -20px;
        margin-left: -20px;
        width: 40px;
        height: 40px;
        border: 4px solid #0d6efd;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        z-index: 11;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <!-- Main Converter Card -->
            <div class="converter-container mb-5 converter">
                <div class="converter-header">
                    <h1 class="mb-2">Sinhala Unicode Converter</h1>
                    <p class="mb-0 lead">Convert between Sinhala Unicode and FM/Wijesekara fonts in real-time</p>
                </div>

                <div class="p-4">
                    <!-- Conversion Type Toggle -->
                    <div class="row mb-4">
                        <div class="col-md-6 mx-auto">
                            <div class="btn-group conversion-type-toggle w-100" role="group" id="conversionTypeGroup">
                                <button type="button" class="btn btn-primary btn-toggle active" id="fmToUnicodeBtn">
                                    <i class="fas fa-arrow-right me-2"></i>FM to Unicode
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-toggle" id="unicodeToFMBtn">
                                    <i class="fas fa-arrow-left me-2"></i>Unicode to FM
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Text Areas -->
                    <div class="row mb-4">
                        <!-- Input Text Area -->
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="textarea-container">
                                <span class="text-area-label" id="inputLabel">Type or paste text here</span>
                                <textarea class="form-control" id="inputText" rows="8" placeholder="Enter text to convert..."></textarea>
                                <div class="mt-2 auto-detect text-muted">
                                    <i class="fas fa-magic me-1"></i> Auto-detecting input type...
                                </div>
                            </div>
                        </div>

                        <!-- Output Text Area -->
                        <div class="col-md-6">
                            <div class="textarea-container">
                                <span class="text-area-label" id="outputLabel">Converted result</span>
                                <textarea class="form-control bg-light" id="outputText" rows="8" readonly></textarea>
                                <button class="copy-btn" id="copyBtn" title="Copy to clipboard">
                                    <i class="fas fa-copy"></i>
                                </button>
                                <div class="mt-2 text-success d-none" id="copySuccess">
                                    <i class="fas fa-check me-1"></i> Copied to clipboard!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-outline-secondary me-2" id="clearBtn">
                                <i class="fas fa-eraser me-2"></i>Clear
                            </button>
                            <button class="btn btn-outline-secondary me-2" id="swapBtn">
                                <i class="fas fa-exchange-alt me-2"></i>Swap
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card converter-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>About This Converter</h5>
                        </div>
                        <div class="card-body">
                            <p>This converter allows you to convert between Sinhala Unicode and legacy FM/Wijesekara font formats in real-time.</p>
                            <p>The tool automatically detects the input format and converts to the other format as you type.</p>

                            <h6 class="mt-4">Features:</h6>
                            <ul>
                                <li>Real-time conversion as you type</li>
                                <li>Convert in both directions (FM to Unicode and Unicode to FM)</li>
                                <li>Copy results to clipboard with one click</li>
                                <li>Auto-detection of input format</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card converter-card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-question-circle me-2"></i>How to Use</h5>
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>Type or paste Sinhala text in the left text area</li>
                                <li>The converter will automatically detect if it's Unicode or FM/Wijesekara format</li>
                                <li>See the converted result in the right text area</li>
                                <li>Click the copy button to copy the converted text to your clipboard</li>
                            </ol>

                            <div class="alert alert-info mt-3">
                                <i class="fas fa-lightbulb me-2"></i>
                                <strong>Tip:</strong> You can also manually toggle between conversion modes using the buttons at the top.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const inputText = document.getElementById('inputText');
        const outputText = document.getElementById('outputText');
        const fmToUnicodeBtn = document.getElementById('fmToUnicodeBtn');
        const unicodeToFMBtn = document.getElementById('unicodeToFMBtn');
        const clearBtn = document.getElementById('clearBtn');
        const swapBtn = document.getElementById('swapBtn');
        const copyBtn = document.getElementById('copyBtn');
        const copySuccess = document.getElementById('copySuccess');
        const inputLabel = document.getElementById('inputLabel');
        const outputLabel = document.getElementById('outputLabel');
        const autoDetect = document.querySelector('.auto-detect');
        const converter = document.querySelector('.converter');

        // CSRF token for AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Conversion mode (default is FM to Unicode)
        let conversionMode = 'fmToUnicode';

        // Auto-detection variables
        let detectedType = null;

        // Set to true to use client-side conversion, false to use server API
        const useClientSideConversion = true; // Set to false to use server API

        /**
         * FM to Unicode Conversion Mappings
         * These mappings convert FM/Wijesekara font characters to Unicode Sinhala
         */
        const fmToUnicodeMappings = {
            // ASCII to Unicode mappings
            ',': 'ල',
            '.': '.',
            '(': '(',
            '\'': ',',
            '%': '%',
            '/': '$',
            '–': '‐',
            '?': '@',
            '!': 'æ',
            '=': '}',
            '\'': '~',
            '+': '¤',
            ':': '•',
            '÷': '›',
            ';': '∙',

            // Consonants
            'l': 'ක',
            'w': 'අ',
            'b': 'ඉ',
            'W': 'උ',
            'R': 'ඍ',
            't': 'එ',
            'T': 'ඔ',
            'L': 'ඛ',
            'c': 'ජ',
            'C': 'ඞ',
            'p': 'ච',
            'P': 'ඡ',
            '[': 'ඤ',
            'g': 'ට',
            'G': 'ඨ',
            'v': 'ඩ',
            'V': 'ඪ',
            'K': 'ණ',
            ';': 'ත',
            ':': 'ථ',
            'o': 'ද',
            'O': 'ධ',
            'k': 'න',
            'm': 'ප',
            'M': 'ඵ',
            'n': 'බ',
            'N': 'භ',
            'u': 'ම',
            'h': 'ය',
            'r': 'ර',
            'j': 'ව',
            'Y': 'ශ',
            'I': 'ෂ',
            'i': 'ස',
            'y': 'හ',
            '<': 'ළ',
            'F': 'ෆ',
            '{': 'ඥ',
            '|': 'ඳ',

            // Special consonants
            'x': 'ං',     // anusvaraya
            'X': 'ඃ',     // visargaya

            // Vowel signs and modifiers
            'd': 'ා',     // aa
            'e': 'ැ',     // ae
            'E': 'ෑ',     // aee
            's': 'ි',     // i
            'S': 'ී',     // ii
            'q': 'ු',     // u
            'Q': 'ූ',     // uu
            'D': 'ෘ',     // iru
            'DD': 'ෲ',    // iruu
            'f': 'ෙ',     // e
            'a': '්',      // hal
            'H': '්‍ය',    // yansaya
            '%': '්‍ර',    // rakaransaya

            // Complex mappings for combined characters
            'yo': 'යො',
            'ff;%': 'ත්‍රෛ',
            'ffY': 'ශෛ',
            'ffp': 'චෛ',
            'ffc': 'ජෛ',
            'ffl': 'කෛ',
            'ffu': 'මෛ',
            'ffm': 'පෛ',
            'ffo': 'දෛ',
            'ff;': 'තෛ',
            'ffk': 'නෛ',
            'ffO': 'ධෛ',
            'ffj': 'වෛ',
            'fm%!': 'ප්‍රෞ',

            // Special combinations for consonants with vowel signs
            'fI!': 'ෂෞ',
            'fP!': 'ඡෞ',
            'fY!': 'ශෞ',
            'fn!': 'බෞ',
            'fp!': 'චෞ',
            'fv!': 'ඩෞ',
            'f*!': 'ෆෞ',
            'f.!': 'ගෞ',
            'fc!': 'ජෞ',
            'fl!': 'කෞ',
            'f,!': 'ලෞ',
            'fu!': 'මෞ',
            'fk!': 'නෞ',
            'fm!': 'පෞ',
            'fo!': 'දෞ',
            'fr!': 'රෞ',
            'fi!': 'සෞ',
            'fg!': 'ටෞ',
            'f;!': 'තෞ',
            'fN!': 'භෞ',
            'f[!': 'ඤෞ',

            // Numbers
            '0': '0',
            '1': '1',
            '2': '2',
            '3': '3',
            '4': '4',
            '5': '5',
            '6': '6',
            '7': '7',
            '8': '8',
            '9': '9',
        };

        /**
         * Convert FM/Wijesekara text to Unicode Sinhala
         * @param {string} text - FM font text to convert
         * @return {string} - Unicode Sinhala text
         */
        function convertFMToUnicode(text) {
            let unicodeText = text;

            // Sort mappings by key length (longest first) to handle complex patterns first
            const sortedMappings = Object.entries(fmToUnicodeMappings)
                .sort((a, b) => b[0].length - a[0].length);

            // Replace FM font characters with Unicode equivalents
            for (const [fm, unicode] of sortedMappings) {
                // Use regex with word boundary to avoid replacing parts of other characters
                const regex = new RegExp(fm.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'g');
                unicodeText = unicodeText.replace(regex, unicode);
            }

            return unicodeText;
        }

        /**
         * Unicode to FM Conversion Mappings
         * These mappings convert Unicode Sinhala characters to FM/Wijesekara font
         */
        const unicodeToFMMappings = {
            // Basic consonants
            'ල': ',',
            'ග': '.',
            'ක': 'l',
            'අ': 'w',
            'ඉ': 'b',
            'උ': 'W',
            'ඍ': 'R',
            'එ': 't',
            'ඔ': 'T',
            'ඛ': 'L',
            'ජ': 'c',
            'ඞ': 'C',
            'ච': 'p',
            'ඡ': 'P',
            'ඤ': '[',
            'ට': 'g',
            'ඨ': 'G',
            'ඩ': 'v',
            'ඪ': 'V',
            'ණ': 'K',
            'ත': ';',
            'ථ': ':',
            'ද': 'o',
            'ධ': 'O',
            'න': 'k',
            'ප': 'm',
            'ඵ': 'M',
            'බ': 'n',
            'භ': 'N',
            'ම': 'u',
            'ය': 'h',
            'ර': 'r',
            'ව': 'j',
            'ශ': 'Y',
            'ෂ': 'I',
            'ස': 'i',
            'හ': 'y',
            'ළ': '<',
            'ෆ': 'F',
            'ඥ': '{',
            'ඳ': '|',
            'ක්‍ෂ': 'Ì',
            'ං': 'x',
            'ඃ': '#',
            'ඹ': 'U',

            // Vowel signs and modifiers
            'ා': 'd',
            'ැ': 'e',
            'ෑ': 'E',
            'ි': 's',
            'ී': 'S',
            'ු': 'q',
            'ූ': 'Q',
            'ෘ': 'D',
            'ෲ': 'DD',
            'ෙ': 'f',
            '්': 'a',
            '්‍ය': 'H',
            '්‍ර': '%',

            // Long vowels
            'ආ': 'wd',
            'ඇ': 'we',
            'ඈ': 'wE',
            'ඊ': 'B',
            'ඌ': 'W!',
            'ඒ': 'ta,',
            'ඕ': 'Ta',
            'ඖ': 'T!',

            // Complex combinations
            'ත්‍රෛ': 'ff;%',
            'ශෛ': 'ffY',
            'චෛ': 'ffp',
            'ජෛ': 'ffc',
            'කෛ': 'ffl',
            'මෛ': 'ffu',
            'පෛ': 'ffm',
            'දෛ': 'ffo',
            'තෛ': 'ff;',
            'නෛ': 'ffk',
            'ධෛ': 'ffO',
            'වෛ': 'ffj',
            'ප්‍රෞ': 'fm%!',

            // Complex vowel combinations
            'ෂෞ': 'fI!',
            'ඡෞ': 'fP!',
            'ශෞ': 'fY!',
            'බෞ': 'fn!',
            'චෞ': 'fp!',
            'ඩෞ': 'fv!',
            'ෆෞ': 'f*!',
            'ගෞ': 'f.!',
            'ජෞ': 'fc!',
            'කෞ': 'fl!',
            'ලෞ': 'f,!',
            'මෞ': 'fu!',
            'නෞ': 'fk!',
            'පෞ': 'fm!',
            'දෞ': 'fo!',
            'රෞ': 'fr!',
            'සෞ': 'fi!',
            'ටෞ': 'fg!',
            'තෞ': 'f;!',
            'භෞ': 'fN!',
            'ඤෞ': 'f[!',
        };

        /**
         * Convert Unicode Sinhala to FM/Wijesekara font
         * @param {string} text - Unicode Sinhala text to convert
         * @return {string} - FM font text
         */
        function convertUnicodeToFM(text) {
            let fmText = text;

            // Sort mappings by key length (longest first) to handle complex patterns first
            const sortedMappings = Object.entries(unicodeToFMMappings)
                .sort((a, b) => b[0].length - a[0].length);

            // Replace Unicode characters with FM font equivalents
            for (const [unicode, fm] of sortedMappings) {
                const regex = new RegExp(unicode.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'gu');
                fmText = fmText.replace(regex, fm);
            }

            return fmText;
        }

        /**
         * Auto-detect text type (FM or Unicode)
         * @param {string} text - Text to analyze
         * @return {string} - 'fm' or 'unicode'
         */
        function detectTextType(text) {
            // Skip empty text or very short text
            if (!text || text.length < 2) {
                return 'fm'; // Default to FM
            }

            // Count characters that are likely to be FM font vs Unicode
            const fmPatterns = /[lkjpoiuytrewqasdfghjmnbvcxz]/i;
            const unicodePatterns = /[\u0D80-\u0DFF]/; // Unicode range for Sinhala

            let fmCount = 0;
            let unicodeCount = 0;

            for (let i = 0; i < text.length; i++) {
                const char = text[i];
                if (fmPatterns.test(char)) {
                    fmCount++;
                }
                if (unicodePatterns.test(char)) {
                    unicodeCount++;
                }
            }

            // Determine type based on counts
            // If there are any Unicode characters, assume it's Unicode
            if (unicodeCount > 0) {
                return 'unicode';
            } else {
                return 'fm';
            }
        }

        /**
         * Perform conversion based on current mode
         */
        function performConversion() {
            const input = inputText.value;

            if (useClientSideConversion) {
                // Client-side conversion
                if (conversionMode === 'fmToUnicode') {
                    outputText.value = convertFMToUnicode(input);
                } else {
                    outputText.value = convertUnicodeToFM(input);
                }
            } else {
                // Server-side conversion
                converter.classList.add('loading');

                if (conversionMode === 'fmToUnicode') {
                    // FM to Unicode API call
                    fetch('{{ route("unicode.fm-to-unicode") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ text: input })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            outputText.value = data.converted_text;
                        } else {
                            console.error('Conversion failed');
                        }
                        converter.classList.remove('loading');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        converter.classList.remove('loading');
                    });
                } else {
                    // Unicode to FM API call
                    fetch('{{ route("unicode.unicode-to-fm") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ text: input })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            outputText.value = data.converted_text;
                        } else {
                            console.error('Conversion failed');
                        }
                        converter.classList.remove('loading');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        converter.classList.remove('loading');
                    });
                }
            }
        }

        /**
         * Copy output text to clipboard
         */
        function copyToClipboard() {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(outputText.value).then(function() {
                    // Show copy success message
                    copySuccess.classList.remove('d-none');
                    copySuccess.style.opacity = '1';
                    setTimeout(() => {
                        copySuccess.style.opacity = '0';
                        setTimeout(() => {
                            copySuccess.classList.add('d-none');
                        }, 500);
                    }, 2000);
                }, function(err) {
                    console.error('Could not copy text: ', err);
                    // Fallback for older browsers
                    try {
                        outputText.select();
                        document.execCommand('copy');
                        // Show copy success message
                        copySuccess.classList.remove('d-none');
                        copySuccess.style.opacity = '1';
                        setTimeout(() => {
                            copySuccess.style.opacity = '0';
                            setTimeout(() => {
                                copySuccess.classList.add('d-none');
                            }, 500);
                        }, 2000);
                    } catch (e) {
                        alert('Failed to copy text.');
                    }
                });
            } else {
                 // Fallback for older browsers
                try {
                    outputText.select();
                    document.execCommand('copy');
                    // Show copy success message
                    copySuccess.classList.remove('d-none');
                    copySuccess.style.opacity = '1';
                    setTimeout(() => {
                        copySuccess.style.opacity = '0';
                        setTimeout(() => {
                            copySuccess.classList.add('d-none');
                        }, 500);
                    }, 2000);
                } catch (e) {
                    alert('Failed to copy text.');
                }
            }
        }

        /**
         * Clear both input and output fields
         */
        function clearFields() {
            inputText.value = '';
            outputText.value = '';
            autoDetect.style.display = 'none';
        }

        /**
         * Swap input and output text
         */
        function swapTexts() {
            const temp = inputText.value;
            inputText.value = outputText.value;
            outputText.value = temp;

            // Also swap conversion mode
            if (conversionMode === 'fmToUnicode') {
                setConversionMode('unicodeToFM');
            } else {
                setConversionMode('fmToUnicode');
            }
        }

        /**
         * Set conversion mode and update UI
         * @param {string} mode - 'fmToUnicode' or 'unicodeToFM'
         */
        function setConversionMode(mode) {
            conversionMode = mode;

            // Update UI to reflect current mode
            if (mode === 'fmToUnicode') {
                fmToUnicodeBtn.classList.add('active');
                unicodeToFMBtn.classList.remove('active');
                inputLabel.textContent = 'FM Font / Wijesekara Input';
                outputLabel.textContent = 'Unicode Sinhala Output';
            } else {
                unicodeToFMBtn.classList.add('active');
                fmToUnicodeBtn.classList.remove('active');
                inputLabel.textContent = 'Unicode Sinhala Input';
                outputLabel.textContent = 'FM Font / Wijesekara Output';
            }

            // Re-perform conversion if there's input text
            if (inputText.value) {
                performConversion();
            }
        }

        // Event Listeners

        // Real-time conversion as user types
        inputText.addEventListener('input', function() {
            performConversion();

            // Show auto-detect suggestion if enough text
            if (inputText.value.length > 5) {
                if (useClientSideConversion) {
                    // Client-side detection
                    const detectedType = detectTextType(inputText.value);
                    showAutoDetectSuggestion(detectedType);
                } else {
                    // Server-side detection
                    fetch('{{ route("unicode.detect-type") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ text: inputText.value })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showAutoDetectSuggestion(data.type);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            } else {
                autoDetect.style.display = 'none';
            }

            /**
             * Display auto-detect suggestion based on detected text type
             * @param {string} detectedType - 'fm' or 'unicode'
             */
            function showAutoDetectSuggestion(detectedType) {
                if (detectedType === 'unicode' && conversionMode === 'fmToUnicode') {
                    autoDetect.style.display = 'block';
                    autoDetect.textContent = 'Detected Unicode text. Switch to Unicode → FM mode?';
                } else if (detectedType === 'fm' && conversionMode === 'unicodeToFM') {
                    autoDetect.style.display = 'block';
                    autoDetect.textContent = 'Detected FM text. Switch to FM → Unicode mode?';
                } else {
                    autoDetect.style.display = 'none';
                }
            }
        });

        // Mode selection buttons
        fmToUnicodeBtn.addEventListener('click', function() {
            setConversionMode('fmToUnicode');
        });

        unicodeToFMBtn.addEventListener('click', function() {
            setConversionMode('unicodeToFM');
        });

        // Action buttons
        clearBtn.addEventListener('click', clearFields);
        swapBtn.addEventListener('click', swapTexts);
        copyBtn.addEventListener('click', copyToClipboard);

        // Auto-detect suggestion click
        autoDetect.addEventListener('click', function() {
            if (conversionMode === 'fmToUnicode') {
                setConversionMode('unicodeToFM');
            } else {
                setConversionMode('fmToUnicode');
            }
            autoDetect.style.display = 'none';
            // Re-convert the text with the new mode
            performConversion();
        });

        // Set initial mode
        setConversionMode('fmToUnicode');
    });
</script>
@endpush
