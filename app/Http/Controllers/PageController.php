<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Models\Book;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
{
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
    public function create()
    {
        $query =  Book::with('chapters');

        if (auth()->user()->hasRole('admin|Admin')) {
            $books = $query->orderBy('id', 'DESC')->get();
        }

        if (auth()->user()->hasRole('editor|Editor')) {
            $user_id = auth()->user()->id;
            $books = $query->where('user_id', $user_id)
                ->orderBy('id', 'DESC')->get();
        }

        return view('admin.books.page.add', [
            'books' => $books,
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
            return redirect()->route('admin.page.add')->withErrors($e->getMessage());
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
    public function edit(Page $page)
    {
        $books = Book::all();
        return view('admin.books.page.edit', [
            'page' => $page,
            'books' => $books,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            // $validated['user_id'] = $page->book->user_id;

            $page->update($validated);
            return redirect()->route('admin.books.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.page.edit', $page->id)->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
