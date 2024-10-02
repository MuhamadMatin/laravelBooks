<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateChapterRequest;

class ChapterController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($book, Chapter $chapter)
    {
        $book = Book::where('slug', $book)->firstOrFail()
            ->load('pages');

        return view('books.chapter.show', [
            'book' => $book,
            'chapter' => $chapter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        $books = Book::all();
        return view(
            'admin.books.chapter.edit',
            [
                'chapter' => $chapter,
                'books' => $books,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $chapter->update($validated);
            return redirect()->route('admin.books.index', $chapter->book_id);
        } catch (\Throwable $e) {
            return redirect()->route('admin.chapter.edit', $chapter->id)->withErrors($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        //
    }
}
