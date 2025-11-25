<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FormSubmissionController;

// === AUTH ===
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// === HALAMAN UTAMA ===
Route::get('/', [ChatController::class, 'index'])->name('home');
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');

// === LANGUAGE (bisa diakses semua) ===
Route::post('/lang', [LanguageController::class, 'set'])->name('lang.set');

// === ROUTES YANG MEMBUTUHKAN LOGIN ===
Route::middleware(['auth'])->group(function () {
    
    // === FORM PDF (hanya login) ===
    Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
    Route::get('/forms/download/{id}', [FormController::class, 'download'])->name('forms.download');

    // === RIWAYAT CHAT (customer) ===
    Route::get('/chat/history', [ChatController::class, 'history'])->name('chat.history');

    // === FORM PEMBUKAAN REKENING (hanya login) ===
    Route::get('/form-pembukaan-rekening', [FormSubmissionController::class, 'create'])->name('form.pembukaan-rekening');
    Route::post('/form-pembukaan-rekening', [FormSubmissionController::class, 'store'])->name('form.submit');
    Route::get('/form-pembukaan-rekening/success', [FormSubmissionController::class, 'success'])->name('form.success');
    Route::get('/form-pembukaan-rekening/history', [FormSubmissionController::class, 'history'])->name('form.history');
    Route::get('/forms/download-submission/{id}', [FormSubmissionController::class, 'download'])->name('forms.download-submission');
    Route::get('/form-pembukaan-rekening/success/{id?}', [FormSubmissionController::class, 'success'])->name('form.success');
});

// === ADMIN PANEL ===
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/api/stats', [DashboardController::class, 'getStats'])->name('stats.api');

    Route::prefix('form-submissions')->name('forms.submission.')->group(function () {
    Route::get('/', [AdminController::class, 'formSubmissionsIndex'])->name('index');
    Route::patch('/{id}/status', [AdminController::class, 'updateSubmissionStatus'])->name('update-status');
    Route::get('/{id}/view-pdf', [AdminController::class, 'viewSubmissionPdf'])->name('view-pdf');
    Route::get('/{id}/download', [FormSubmissionController::class, 'download'])->name('download');
});

    // Q&A Chatbot
    Route::get('/chat', [AdminController::class, 'chatIndex'])->name('chat');
    Route::post('/chat/store', [AdminController::class, 'chatStore'])->name('chat.store');
    Route::delete('/chat/{id}', [AdminController::class, 'chatDestroy'])->name('chat.destroy');
    Route::get('/chat/edit/{id}', [AdminController::class, 'chatEdit'])->name('chat.edit');
    Route::patch('/chat/update/{id}', [AdminController::class, 'chatUpdate'])->name('chat.update');
    Route::patch('/chat/toggle/{id}', [AdminController::class, 'chatToggle'])->name('chat.toggle');
    Route::patch('/chat/order/{id}', [AdminController::class, 'chatOrder'])->name('chat.order');
    Route::get('/chat/export', [AdminController::class, 'exportExcel'])->name('chat.export');

    // Form PDF
    Route::get('/forms', [AdminController::class, 'formIndex'])->name('forms');
    Route::post('/form/upload', [AdminController::class, 'uploadForm'])->name('form.upload');
    Route::delete('/form/{id}', [AdminController::class, 'formDestroy'])->name('form.destroy');

    // Riwayat Chat Admin
    Route::get('/chat/history', [AdminController::class, 'history'])->name('chat.history');

    // Kelola User
    Route::get('/users', [AdminController::class, 'userIndex'])->name('users');
    Route::delete('/users/{id}', [AdminController::class, 'userDestroy'])->name('user.destroy');

    // === FORM SUBMISSION MANAGEMENT (ADMIN) ===
    Route::prefix('form-submissions')->name('forms.submission.')->group(function () {
        Route::get('/', [FormSubmissionController::class, 'index'])->name('index');
        Route::get('/{id}', [FormSubmissionController::class, 'show'])->name('show');
        Route::delete('/{id}', [FormSubmissionController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/download', [FormSubmissionController::class, 'download'])->name('download');
        Route::get('/export/excel', [FormSubmissionController::class, 'exportExcel'])->name('export.excel');
        Route::get('/export/pdf', [FormSubmissionController::class, 'exportPDF'])->name('export.pdf');
    });
});