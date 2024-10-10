<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Models\Book;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Chapter;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PageController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'role_or_permission:view_page|view_any_page|create_page|edit_page|delete_page',
            new Middleware('permission:view_page|view_any_page', only: ['index']),
            new Middleware('permission:create_page', only: ['create', 'store']),
            new Middleware('permission:edit_page', only: ['edit', 'update']),
            new Middleware('permission:delete_page', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book, Chapter $chapter)
    {

        return view('admin.books.page.add', [
            'book' => $book,
            'chapter' => $chapter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            // $validated['user_id'] = $page->book->user_id;

            Page::create($validated);
            return redirect()->route('admin.books.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.books.chapters.pages.create')->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($book, $chapter, Page $page)
    {
        return view('books.page.show', [
            'book' => $book,
            'chapter' => $chapter,
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book, Chapter $chapter, Page $page)
    {
        return view('admin.books.page.edit', [
            'book' => $book,
            'chapter' => $chapter,
            'page' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Book $book, Chapter $chapter, Page $page)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            // $validated['user_id'] = $page->book->user_id;

            $page->update($validated);
            return redirect()->route('admin.books.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.books.chapters.pages.edit', $page)->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, Chapter $chapter, Page $page)
    {
        try {
            $pageNotFound = Page::find($page)->first();
            if (!$pageNotFound) {
                return redirect()->route('admin.books.show', $book)->withErrors('Page not found');
            }
            $page->delete();
            return redirect()->route('admin.books.show', $book);
        } catch (\Throwable $e) {
            return redirect()->route('admin.books.show', $book)->withErrors('Page not found');
        }
    }
}
