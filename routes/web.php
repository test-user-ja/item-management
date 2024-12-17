<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    // Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    // Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/', [ItemController::class, 'index']);
    Route::get('/add', [ItemController::class, 'add']);
    Route::post('/add', [ItemController::class, 'add']);
    Route::get('/edit/{user_id}',[ItemController::class, 'edit'])->name('edit');
    Route::post('/{user_id}',[ItemController::class, 'update'])->name('update');

});

// Route::get('/edit/{user_id}',[ItemController::class, 'edit'])->name('edit');
// Route::post('/{user_id}',[ItemController::class, 'update'])->name('update');