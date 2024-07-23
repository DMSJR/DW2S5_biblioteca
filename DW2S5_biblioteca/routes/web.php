<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\LibraryController;

Route::get('/', [LibraryController::class, 'index']);
Route::get('/book/register', [LibraryController::class, 'registerBook'])->middleware('auth');
Route::post('/book', [LibraryController::class, 'store']);
Route::get('/book/{id}', [LibraryController::class, 'show'])->name('book.show');;
Route::delete('/book/{id}', [LibraryController::class, 'destroy'])->middleware('auth');
Route::get('book/edit/{id}', [LibraryController::class, 'edit'])->middleware('auth');
Route::put('book/update/{id}', [LibraryController::class, 'update'])->middleware('auth');
Route::get('search', [LibraryController::class, 'search'])->name('book.search');
Route::get('/search-test', function () {
    dd('Test route called');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
