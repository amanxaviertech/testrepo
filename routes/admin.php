<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PagebuilderController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\EditorController;

// Admin dashboard route
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Additional admin routes can be added here

    // Pages Routes
    Route::get('/tabledata', [PageController::class, 'tabledata'])->name('tabledata');
    Route::get('/pages', [PageController::class, 'index'])->name('pages');
    Route::post('/pages', [PageController::class, 'create'])->name('createpage');
    Route::get('/pages/{page_id}', [PageController::class, 'edit'])->name('editpage');
    Route::post('/pages/{page_id}', [PageController::class, 'update'])->name('updatepage');
    Route::put('/pages', [PageController::class, 'updateStatus'])->name('pages.updateStatus');
    Route::delete('/pages/{page_id}', [PageController::class, 'destroy'])->name('deletepage');

    // Page Builder
    // Route::get('/pagebuilder', [PageController::class, 'pageBuilder'])->name('pageBuilder');
    Route::get('/pagebuilder', [PagebuilderController::class, 'index'])->name('pageBuilder.index');
    Route::get('/pagebuilder/create', [PagebuilderController::class, 'create'])->name('pageBuilder.create');
    Route::get('/pagebuilder/{id}', [PagebuilderController::class, 'showEditor'])->name('pageBuilder.show');
    Route::post('/save-page', [PagebuilderController::class, 'savePage'])->name('pageBuilder.save');
    Route::post('/update-page/{id}', [PagebuilderController::class, 'updatePage'])->name('pageBuilder.update');
    Route::post('/load-page', [PagebuilderController::class, 'load'])->name('pageBuilder.load');
    Route::get('/page/preview/{id}', [PagebuilderController::class, 'previewEditorpage'])->name('previewEditorpage');


    Route::get('/preview/{page_id}', [PagesectionController::class, 'show'])->name('previewpage');
    // Route::get('/preview/{page_id}', 'PreviewController@show')->name('previewpage');

    Route::post('/submit-form', [PageController::class, 'submitForm'])->name('submitForm');


        // Form Routes
        Route::get('/forms', [FormController::class, 'index'])->name('forms');


    // Editor
    Route::get('/editor', [EditorController::class, 'index'])->name('editor.index');



});

