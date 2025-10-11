<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PoliceDirectoryController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('user.home'); // Changed route name to avoid conflict

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');

// Police Directory routes
Route::get('/police-directory', [PoliceDirectoryController::class, 'index'])->name('police.directory');
Route::get('/api/police/search', [PoliceDirectoryController::class, 'search'])->name('police.search');
Route::get('/api/police/provinces/{province}/divisions', [PoliceDirectoryController::class, 'getDivisions']);
Route::get('/api/police/divisions/{division}/stations', [PoliceDirectoryController::class, 'getStations']);
Route::get('/api/police/stations/{station}', [PoliceDirectoryController::class, 'getStation']);
// Testimonial routes
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/api/testimonials/featured', [TestimonialController::class, 'getFeatured'])->name('testimonials.featured');
Route::middleware('auth')->group(function () {
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
});

// PWA Manifest route
Route::get('/manifest.json', function () {
    return response()->file(public_path('manifest.json'), [
        'Content-Type' => 'application/manifest+json'
    ]);
})->name('manifest');

// Sitemap route
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Public Penal Code route
Route::get('/penal-code/public', [App\Http\Controllers\PenalCodeController::class, 'publicIndex'])->name('penal-code.public');

// Criminal Procedure Code routes
// Public Criminal Procedure Code routes (must come first)
Route::get('/criminal-procedure-code', [App\Http\Controllers\CriminalProcedureCodeController::class, 'publicIndex'])->name('criminal-procedure-code.public');
Route::get('/criminal-procedure-code/public/{section}', [App\Http\Controllers\CriminalProcedureCodeController::class, 'publicShow'])->name('criminal-procedure-code.public.show');

// Authenticated Criminal Procedure Code routes
Route::get('/criminal-procedure-code/auth', [App\Http\Controllers\CriminalProcedureCodeController::class, 'index'])->name('criminal-procedure-code.index')->middleware('auth');
Route::get('/criminal-procedure-code/{section}', [App\Http\Controllers\CriminalProcedureCodeController::class, 'show'])->name('criminal-procedure-code.show');
Route::post('/criminal-procedure-code/{section}/note', [App\Http\Controllers\CriminalProcedureCodeController::class, 'saveNote'])->name('criminal-procedure-code.note.save')->middleware('auth');
Route::delete('/criminal-procedure-code/{section}/note', [App\Http\Controllers\CriminalProcedureCodeController::class, 'deleteNote'])->name('criminal-procedure-code.note.delete')->middleware('auth');
Route::post('/criminal-procedure-code/{section}/star', [App\Http\Controllers\CriminalProcedureCodeController::class, 'toggleStar'])->name('criminal-procedure-code.star.toggle')->middleware('auth');
Route::post('/criminal-procedure-code/{section}/like', [App\Http\Controllers\CriminalProcedureCodeController::class, 'toggleLike'])->name('criminal-procedure-code.like.toggle')->middleware('auth');
// Tools Routes
Route::get('/tools/unicode-typing', [App\Http\Controllers\UnicodeConverterController::class, 'index'])->name('tools.unicode-typing');
Route::post('/tools/unicode-typing/fm-to-unicode', [App\Http\Controllers\UnicodeConverterController::class, 'fmToUnicode'])->name('unicode.fm-to-unicode');
Route::post('/tools/unicode-typing/unicode-to-fm', [App\Http\Controllers\UnicodeConverterController::class, 'unicodeToFm'])->name('unicode.unicode-to-fm');
Route::post('/tools/unicode-typing/detect-type', [App\Http\Controllers\UnicodeConverterController::class, 'detectType'])->name('unicode.detect-type');

Route::get('/tools/name-converter', [App\Http\Controllers\NameConverterController::class, 'index'])->name('tools.name-converter');
Route::post('/tools/name-converter/single', [App\Http\Controllers\NameConverterController::class, 'convertSingle'])->name('name-converter.single');
Route::post('/tools/name-converter/bulk', [App\Http\Controllers\NameConverterController::class, 'convertBulk'])->name('name-converter.bulk');
Route::get('/tools/name-converter/download-template', [App\Http\Controllers\NameConverterController::class, 'downloadTemplate'])->name('name-converter.download-template');

// Test route for ZIP functionality
Route::get('/test-zip', function () {
    $result = [
        'zip_extension_loaded' => extension_loaded('zip'),
        'ziparchive_class_exists' => class_exists('ZipArchive'),
        'php_version' => PHP_VERSION,
    ];

    try {
        $zip = new ZipArchive();
        $result['ziparchive_instantiation'] = 'Success - ZipArchive can be created';
    } catch (Exception $e) {
        $result['ziparchive_instantiation'] = 'Error: ' . $e->getMessage();
    }

    return response()->json($result);
});

Route::get('/tools/sl-idcard-details', function () {
    return view('tools.sl-idcard-details');
})->name('tools.sl-idcard-details');

Route::post('/tools/sl-idcard-bulk-convert', [App\Http\Controllers\SLIdCardController::class, 'bulkConvert'])->name('tools.sl-idcard-bulk-convert');
Route::post('/tools/sl-idcard-analyze-file', [App\Http\Controllers\SLIdCardController::class, 'analyzeFile'])->name('tools.sl-idcard-analyze-file');
Route::post('/tools/sl-idcard-download-template', [App\Http\Controllers\SLIdCardController::class, 'downloadTemplate'])->name('tools.sl-idcard-download-template');
Route::get('/tools/download-conversion-result/{filename}', [App\Http\Controllers\SLIdCardController::class, 'downloadResult'])->name('tools.download-conversion-result');

// Authentication routes
Auth::routes();

// Google OAuth routes
Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

    // Admin Penal Code routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/penal-code', [App\Http\Controllers\Admin\PenalCodeController::class, 'index'])->name('penal-code.index');
    Route::get('/penal-code/create', [App\Http\Controllers\Admin\PenalCodeController::class, 'create'])->name('penal-code.create');
    Route::post('/penal-code', [App\Http\Controllers\Admin\PenalCodeController::class, 'store'])->name('penal-code.store');
    Route::get('/penal-code/{section}/edit', [App\Http\Controllers\Admin\PenalCodeController::class, 'edit'])->name('penal-code.edit');
    Route::put('/penal-code/{section}', [App\Http\Controllers\Admin\PenalCodeController::class, 'update'])->name('penal-code.update');
    Route::delete('/penal-code/{section}', [App\Http\Controllers\Admin\PenalCodeController::class, 'destroy'])->name('penal-code.destroy');
    Route::get('/penal-code/{section}/amendments', [App\Http\Controllers\Admin\PenalCodeController::class, 'showAmendments'])->name('penal-code.amendments');
    Route::get('/penal-code/{section}/amendments/create', [App\Http\Controllers\Admin\PenalCodeController::class, 'createAmendment'])->name('penal-code.amendments.create');
    Route::post('/penal-code/{section}/amendments', [App\Http\Controllers\Admin\PenalCodeController::class, 'storeAmendment'])->name('penal-code.amendments.store');

    // Criminal Procedure Code routes
    Route::get('/criminal-procedure-code', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'index'])->name('criminal-procedure-code.index');
    Route::get('/criminal-procedure-code/create', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'create'])->name('criminal-procedure-code.create');
    Route::post('/criminal-procedure-code', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'store'])->name('criminal-procedure-code.store');
    Route::get('/criminal-procedure-code/{section}/edit', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'edit'])->name('criminal-procedure-code.edit');
    Route::put('/criminal-procedure-code/{section}', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'update'])->name('criminal-procedure-code.update');
    Route::delete('/criminal-procedure-code/{section}', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'destroy'])->name('criminal-procedure-code.destroy');
    Route::get('/criminal-procedure-code/{section}/amendments', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'showAmendments'])->name('criminal-procedure-code.amendments');
    Route::get('/criminal-procedure-code/{section}/amendments/create', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'createAmendment'])->name('criminal-procedure-code.amendments.create');
    Route::post('/criminal-procedure-code/{section}/amendments', [App\Http\Controllers\Admin\CriminalProcedureCodeController::class, 'storeAmendment'])->name('criminal-procedure-code.amendments.store');
});// User dashboard and Penal Code routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // User Profile Management
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile', [\App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::put('/profile/password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.password.update');
    Route::delete('/profile/avatar', [\App\Http\Controllers\UserController::class, 'deleteAvatar'])->name('user.avatar.delete');

        // Penal Code routes for users
    Route::get('/penal-code', [App\Http\Controllers\PenalCodeController::class, 'index'])->name('penal-code.index');
    Route::get('/penal-code/{section}', [App\Http\Controllers\PenalCodeController::class, 'show'])->name('penal-code.show');
    Route::post('/penal-code/{section}/note', [App\Http\Controllers\PenalCodeController::class, 'saveNote'])->name('penal-code.note.save');
    Route::delete('/penal-code/{section}/note', [App\Http\Controllers\PenalCodeController::class, 'deleteNote'])->name('penal-code.note.delete');
    Route::post('/penal-code/{section}/star', [App\Http\Controllers\PenalCodeController::class, 'toggleStar'])->name('penal-code.star.toggle');
    Route::post('/penal-code/{section}/like', [App\Http\Controllers\PenalCodeController::class, 'toggleLike'])->name('penal-code.like.toggle');
});

// Admin routes with middleware
// Admin dashboard using 'admin' middleware alias
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/documents', [AdminController::class, 'documents'])->name('admin.documents');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    // Testimonial management
    Route::get('/testimonials', [TestimonialController::class, 'adminIndex'])->name('admin.testimonials.index');

    // Police Directory management
    Route::prefix('police')->name('admin.police.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'index'])->name('index');

        // Divisions
        Route::get('/divisions/create', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'createDivision'])->name('divisions.create');
        Route::post('/divisions', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'storeDivision'])->name('divisions.store');

        // Stations
        Route::get('/stations/create', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'createStation'])->name('stations.create');
        Route::post('/stations', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'storeStation'])->name('stations.store');
        Route::get('/stations/{station}/edit', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'editStation'])->name('stations.edit');
        Route::put('/stations/{station}', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'updateStation'])->name('stations.update');
        Route::delete('/stations/{station}', [App\Http\Controllers\Admin\PoliceDirectoryController::class, 'destroyStation'])->name('stations.destroy');
    });
    Route::put('/testimonials/{testimonial}/status', [TestimonialController::class, 'updateStatus'])->name('admin.testimonials.status');
    Route::put('/testimonials/{testimonial}/featured', [TestimonialController::class, 'toggleFeatured'])->name('admin.testimonials.featured');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    // Category management
    Route::get('/categories', [DocumentController::class, 'categories'])->name('admin.categories');
    Route::post('/categories', [DocumentController::class, 'storeCategory'])->name('admin.categories.store');
    Route::post('/subcategories', [\App\Http\Controllers\SubcategoryController::class, 'store'])->name('admin.subcategories.store');
    // User management
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/create', [App\Http\Controllers\AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::put('/users/{user}/password', [App\Http\Controllers\AdminController::class, 'updateUserPassword'])->name('admin.users.password');
});

// Public Police Documents page
Route::get('/documents/police', [DocumentController::class, 'policeDocuments'])->name('documents.police');
Route::get('/documents/police/{subcategory}', [DocumentController::class, 'policeDocumentsBySubcategory'])->name('documents.police.subcategory');

// Public law documents page
Route::get('/documents/law', [DocumentController::class, 'lawDocuments'])->name('documents.law');
Route::get('/documents/law/{subcategory}', [DocumentController::class, 'lawDocumentsBySubcategory'])->name('documents.law.subcategory');

// Public document download route with optional type parameter
Route::get('/documents/{document}/download/{type?}', [DocumentController::class, 'download'])->name('documents.download');

// Public documents index page
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');


