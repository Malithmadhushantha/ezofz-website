<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SinhalaConverter;

class UnicodeConverterController extends Controller
{
    protected $sinhalaConverter;

    public function __construct(SinhalaConverter $sinhalaConverter)
    {
        $this->sinhalaConverter = $sinhalaConverter;
    }

    /**
     * Display the unicode converter page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('tools.unicode-typing');
    }

    /**
     * Convert FM/Wijesekara text to Unicode
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fmToUnicode(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $text = $request->input('text');
        $convertedText = $this->sinhalaConverter->fmToUnicode($text);

        return response()->json([
            'success' => true,
            'converted_text' => $convertedText
        ]);
    }

    /**
     * Convert Unicode text to FM/Wijesekara
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unicodeToFm(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $text = $request->input('text');
        $convertedText = $this->sinhalaConverter->unicodeToFm($text);

        return response()->json([
            'success' => true,
            'converted_text' => $convertedText
        ]);
    }

    /**
     * Detect text type (FM or Unicode)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detectType(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $text = $request->input('text');
        $type = $this->sinhalaConverter->detectTextType($text);

        return response()->json([
            'success' => true,
            'type' => $type
        ]);
    }
}
