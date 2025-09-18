<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('user.home'); // Changed route name to avoid conflict

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

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
Route::get('/tools/unicode-typing', function () {
    return view('tools.unicode-typing');
})->name('tools.unicode-typing');

Route::get('/tools/name-converter', [App\Http\Controllers\NameConverterController::class, 'index'])->name('tools.name-converter');
Route::post('/tools/name-converter/single', [App\Http\Controllers\NameConverterController::class, 'convertSingle'])->name('name-converter.single');
Route::post('/tools/name-converter/bulk', [App\Http\Controllers\NameConverterController::class, 'convertBulk'])->name('name-converter.bulk');

// Authentication routes
Auth::routes();

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
Route::middleware([App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/documents', [AdminController::class, 'documents'])->name('admin.documents');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
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

// Public document download route
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');

// Public documents index page
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');

// Public law documents page
Route::get('/documents/law', [DocumentController::class, 'lawDocuments'])->name('documents.law');
