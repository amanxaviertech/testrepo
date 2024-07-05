<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
// use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageController;

Route::get('/images/{filename}', [ImageController::class, 'serveWebp']);


// Load admin routes
Route::group(['prefix' => 'admin'], function () {
    require __DIR__.'/admin.php';
});

Route::get('/', [HomeController::class, 'index'])->name('index');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');
});


Route::get('/page/{slug}', [HomeController::class, 'show'])->name('page');
