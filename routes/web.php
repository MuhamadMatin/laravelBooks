<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\Chapter;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/users', UserController::class);
        Route::resource('/categories', CategoryController::class);
    });
});

// Letakkan rute dinamis setelah rute statis
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/{book:slug}', [BookController::class, 'show'])->name('books.show');
Route::get('/{book:slug}/{chapter:slug}', [ChapterController::class, 'show'])->name('chapter.show');
Route::get('/{book:slug}/{chapter:slug}/{page:slug}', [PageController::class, 'show'])->name('page.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
