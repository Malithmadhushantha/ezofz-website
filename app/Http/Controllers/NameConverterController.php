<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SinhalaConverter;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NameConversionExport;
use App\Imports\NameConversionImport;
use Illuminate\Support\Facades\Storage;

class NameConverterController extends Controller
{
    protected $converter;

    /**
     * Create a new controller instance.
     *
     * @param SinhalaConverter $converter
     * @return void
     */
    public function __construct(SinhalaConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Display the name converter page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('tools.name-converter');
    }

    /**
     * Convert a single name
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function convertSingle(Request $request)
    {
        try {
            // Log incoming request data for debugging
            \Log::info('Name conversion request:', $request->all());

            $request->validate([
                'name' => 'required|string|max:255',
                'conversionType' => 'required|in:full,initials,englishInitials',
            ]);

            $name = $request->name;
            $type = $request->conversionType;

            $result = $this->performConversion($name, $type);

            // Log the result
            \Log::info('Name conversion result:', ['original' => $name, 'converted' => $result]);

            return response()->json([
                'original' => $name,
                'converted' => $result,
                'debug' => 'Conversion successful'
            ]);
        } catch (\Exception $e) {
            // Log any exceptions
            \Log::error('Name conversion error: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => $e->getMessage(),
                'debug' => 'Exception caught in convertSingle'
            ], 500);
        }
    }

    /**
     * Handle file upload and convert names in bulk
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function convertBulk(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
            'conversionType' => 'required|in:full,initials,englishInitials',
        ]);

        try {
            // Import the file and convert names
            $path = $request->file('file')->store('temp');
            $type = $request->conversionType;

            // Get data from the Excel file
            $data = Excel::toArray(new NameConversionImport, $path);
            $results = [];

            // Process the data (the import class already skips to row 4)
            if (!empty($data) && isset($data[0]) && count($data[0]) > 0) {
                foreach ($data[0] as $row) {
                    // Check if the name column has a value (should be in column A)
                    if (!empty($row) && isset($row[0]) && !empty($row[0])) {
                        $name = trim($row[0]);

                        // Skip any rows with example indicators
                        if (stripos($name, 'example') === false) {
                            $converted = $this->performConversion($name, $type);
                            $results[] = [
                                'original' => $name,
                                'converted' => $converted
                            ];
                        }
                    }
                }
            }

            // Check if we have any results
            if (empty($results)) {
                return back()->with('error', 'No valid names found in the uploaded file. Please check the file and try again.');
            }

            // Generate and download the output Excel file
            Storage::delete($path);

            // Add flash message for next visit
            session()->flash('success', 'Names converted successfully! Downloading the results file...');

            return Excel::download(
                new NameConversionExport($results),
                'converted_names_' . date('Y-m-d_His') . '.xlsx'
            );

        } catch (\Exception $e) {
            return back()->with('error', 'Error processing file: ' . $e->getMessage());
        }
    }

    /**
     * Perform the actual name conversion based on type
     *
     * @param string $name
     * @param string $type
     * @return string
     */
    protected function performConversion($name, $type)
    {
        switch ($type) {
            case 'full':
                return $this->converter->englishToSinhala($name);

            case 'initials':
                return $this->converter->englishToSinhalaInitialsLastName($name);

            case 'englishInitials':
                return $this->converter->englishInitialsToSinhalaInitials($name);

            default:
                return $name;
        }
    }
}
