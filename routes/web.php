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

// Authentication routes
Auth::routes();

// User dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
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
