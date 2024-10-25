<?php

use App\Http\Controllers\JokeController;
use Illuminate\Support\Facades\Route;

// Route for the main page with the table
Route::get('/', [JokeController::class, 'list'])->name('jokes.index');
Route::get('/jokes/create', [JokeController::class, 'create'])->name('jokes.create');
Route::get('/jokes/{id}/edit', [JokeController::class, 'edit'])->name('jokes.edit');


Route::prefix('api/jokes')->group(function () {
    Route::post('/add', [JokeController::class, 'store'])->name('jokes.store');
    Route::delete('/{id}', [JokeController::class, 'destroy'])->name('jokes.destroy');
    Route::put('/{id}', [JokeController::class, 'update'])->name('jokes.update');
});

// Route::get('/', function () {
//     return view('welcome');
// });
