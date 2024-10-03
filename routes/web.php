<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\Chapter;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/users', UserController::class)
            ->middleware('admin');
        Route::resource('/books', BookController::class)
            ->middleware('admin');
        Route::resource('/categories', CategoryController::class)
            ->middleware('admin');
        Route::resource('/chapter', ChapterController::class)
            ->middleware('admin');
        Route::resource('/page', PageController::class)
            ->middleware('admin');
    });
});

// Letakkan rute dinamis setelah rute statis
Route::get('/books', [IndexController::class, 'home'])
    ->middleware('admin|editor|user')
    ->name('books.index');
Route::get('/{book:slug}', [IndexController::class, 'indexShowBook'])
    ->middleware('admin|editor|user')
    ->name('books.show');
Route::get('/{book:slug}/{chapter:slug}', [IndexController::class, 'indexShowChapter'])
    ->middleware('admin|editor|user')
    ->name('chapter.show');
Route::get('/{book:slug}/{chapter:slug}/{page:slug}', [IndexController::class, 'indexShowPage'])
    ->middleware('admin|editor|user')
    ->name('page.show');

// Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
// Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
// Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

// Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.delete');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
