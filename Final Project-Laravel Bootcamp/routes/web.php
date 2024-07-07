<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index']);

Route::get('/daftar', [AuthController::class,'daftar']); 

Route::post('/welcome', [AuthController::class,'welcome']);

Route::get('/data-table', function() {
    return view('page.data-table');
});

Route::get('/table', function() {
    return view('page.table');
});


Route::middleware(['auth'])->group(function () {
        // CRUD Genre
        // Create Data Genre
        Route::get('/genre/create', [GenreController::class, 'create']); //mengarahkan ke halaman tambahCast
        Route::post('/genre', [GenreController::class,'store']); //menyimpan data cast ke DB table cast & validation
        // Read Data Genre
        Route::get('/genre', [GenreController::class,'index']); //menampilkan semua cast ke table
        Route::get('/genre/{id}', [GenreController::class,'show']); //menampilkan data berdasarkan parameter {id}
        // Update Data Genre
        Route::get('/genre/{id}/edit', [GenreController::class,'edit']); // ke form edit data
        Route::put('/genre/{id}', [GenreController::class,'update']); // update data berdasarkan id DB cast
        // Delete Data Genre
        Route::delete('/genre/{id}', [GenreController::class,'destroy']); // delete data di DB table cast berdasarkan {id}`

        Route::post('/critics/{film_id}', [ReviewController::class,'store']);
    });

// CRUD Cast
// Create Data Cast
Route::get('/cast/create', [CastController::class, 'create']); //mengarahkan ke halaman tambahCast
Route::post('/cast', [CastController::class,'store']); //menyimpan data cast ke DB table cast & validation
// Read Data Cast
Route::get('/cast', [CastController::class,'index']); //menampilkan semua cast ke table
Route::get('/cast/{id}', [CastController::class,'show']); //menampilkan data berdasarkan parameter {id}
// Update Data Cast
Route::get('/cast/{id}/edit', [CastController::class,'edit']); // ke form edit data
Route::put('/cast/{id}', [CastController::class,'update']); // update data berdasarkan id DB cast
// Delete Data Cast
Route::delete('/cast/{id}', [CastController::class,'destroy']); // delete data di DB table cast berdasarkan {id}

// CRUD Film
// Create Data Film
Route::get('/film/create', [FilmController::class, 'create']); //mengarahkan ke halaman tambahCast
Route::post('/film', [FilmController::class,'store']); //menyimpan data cast ke DB table cast & validation
// Read Data Genre
Route::get('/film', [FilmController::class,'index']); //menampilkan semua cast ke table
Route::get('/film/{id}', [FilmController::class,'show']); //menampilkan data berdasarkan parameter {id}
// Update Data Genre
Route::get('/film/{id}/edit', [FilmController::class,'edit']); // ke form edit data
Route::put('/film/{id}', [FilmController::class,'update']); // update data berdasarkan id DB cast
// Delete Data Genre
Route::delete('/film/{id}', [FilmController::class,'destroy']); // delete data di DB table cast berdasarkan {id}

Auth::routes();