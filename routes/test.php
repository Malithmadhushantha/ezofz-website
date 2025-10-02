<?php

use Illuminate\Support\Facades\Route;

// Simple test route to check ZIP functionality
Route::get('/test-zip', function () {
    return response()->json([
        'zip_extension_loaded' => extension_loaded('zip'),
        'ziparchive_class_exists' => class_exists('ZipArchive'),
        'php_version' => PHP_VERSION,
        'can_create_ziparchive' => function_exists('zip_open') ? 'Yes' : 'No',
        'test_ziparchive' => function() {
            try {
                $zip = new ZipArchive();
                return 'ZipArchive can be instantiated';
            } catch (Exception $e) {
                return 'Error: ' . $e->getMessage();
            }
        }
    ]);
});
