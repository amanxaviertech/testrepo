<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
// use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\DB;


Route::get('/database-details', function () {
    try {
        // Attempt to connect to the database
        DB::connection()->getPdo();

        // Fetch tables for PostgreSQL
        $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");

        if (empty($tables)) {
            throw new \Exception('No tables found in the database.');
        }

        $databaseDetails = [];
        foreach ($tables as $table) {
            $tableName = $table->table_name;
            $data = DB::table($tableName)->get();
            $databaseDetails[$tableName] = $data;
        }

        return view('database-details', ['databaseDetails' => $databaseDetails]);

    } catch (\Exception $e) {
        $errorMessage = $e->getMessage();
        return view('database-details', ['error' => "Could not connect to the database: $errorMessage"]);
    }
});


Route::get('/check-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['message' => 'Database connection is established.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Could not connect to the database: ' . $e->getMessage()], 500);
    }
});


Route::get('/', function () {
    try {
        // Attempt to connect to the database
        $connection = DB::connection()->getPdo();
        $tables = DB::select('SHOW TABLES');

        if (empty($tables)) {
            throw new \Exception('No tables found in the database.');
        }

        $databaseDetails = [];
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
            $data = DB::table($tableName)->get();
            $databaseDetails[$tableName] = $data;
        }

        return view('welcome', ['databaseDetails' => $databaseDetails]);

    } catch (\Exception $e) {
        $errorMessage = $e->getMessage();
        return view('welcome', ['error' => "Could not connect to the database: $errorMessage"]);
    }
});




Route::get('/images/{filename}', [ImageController::class, 'serveWebp']);


// Load admin routes
Route::group(['prefix' => 'admin'], function () {
    require __DIR__.'/admin.php';
});

// Route::get('/', [HomeController::class, 'index'])->name('index');

// Route::get('/', function () {
//     return view('welcome');
// });



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
