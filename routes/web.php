<?php

use App\Models\Chapter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::middleware('auth', 'role_or_permission:Admin|admin|Editor|editor')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/users', UserController::class);
        // ->middleware('role_or_permission:view_any_user');
        Route::resource('/roles', RoleController::class);
        // ->middleware('role_or_permission:view_any_role');
        Route::resource('/books', BookController::class);
        // ->middleware('role_or_permission:view_any_book');
        Route::resource('books.chapters', ChapterController::class);
        // ->middleware('role_or_permission:view_any_chapter');
        Route::resource('books.chapters.pages', PageController::class);
        // ->middleware('role_or_permission:view_any_page');
        Route::resource('/categories', CategoryController::class);
        // ->middleware('role_or_permission:view_any_category');

        Route::get('/', [IndexController::class, 'admin'])
            ->middleware('role:admin|Admin|Editor|editor')
            ->name('index');
        Route::get('/roles/{role}/permissions/edit', [RoleController::class, 'editPermissions'])
            ->middleware('role_or_permission:edit_role')
            ->name('roles.permissions.edit');
        Route::put('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])
            ->middleware('role_or_permission:edit_role')
            ->name('roles.permissions.update');
    });
});

// Route statis harus berada paling bawah
Route::get('/books', [IndexController::class, 'home'])
    ->name('books.index');
Route::get('/{book:slug}', [IndexController::class, 'indexShowBook'])
    ->name('books.show');
Route::get('/{book:slug}/{chapter:slug}', [IndexController::class, 'indexShowChapter'])
    ->name('chapter.show');
Route::get('/{book:slug}/{chapter:slug}/{page:slug}', [IndexController::class, 'indexShowPage'])
    ->name('page.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
