<?php

use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('publisher', PublisherController::class)->middleware('auth');

Route::post('book/{book}/add-author',[BookController::class, 'addUser'])->name('book.add-author');
Route::resource('book', BookController::class)->middleware('auth');

Route::get('inicio', function() {
    return view('inicio');
});