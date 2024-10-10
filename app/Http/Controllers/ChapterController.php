<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChapterRequest;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateChapterRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ChapterController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'role_or_permission:view_chapter|view_any_chapter|create_chapter|edit_chapter|delete_chapter',
            new Middleware('permission:view_chapter|view_any_chapter', only: ['index']),
            new Middleware('permission:create_chapter', only: ['create', 'store']),
            new Middleware('permission:edit_chapter', only: ['edit', 'update']),
            new Middleware('permission:delete_chapter', only: ['destroy']),
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
    public function create(Book $book)
    {
        // $query = Book::query();

        // if (auth()->user()->hasRole('admin|Admin')) {
        //     $books = $query->orderBy('id', 'DESC')->get();
        // }

        // if (auth()->user()->hasRole('editor|Editor')) {
        //     $user_id = auth()->user()->id;
        //     $books = $query->where('user_id', $user_id)
        //         ->orderBy('id', 'DESC')->get();
        // }

        return view('admin.books.chapter.add', [
            'book' => $book,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            Chapter::create($validated);
            return redirect()->route('admin.books.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.books.chapters.create')->withErrors($e);
        }
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
    public function edit(Book $book, Chapter $chapter)
    {
        return view(
            'admin.books.chapter.edit',
            [
                'chapter' => $chapter,
                'book' => $book,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Book $book, Chapter $chapter)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $chapter->update($validated);
            return redirect()->route('admin.books.index', $chapter->book_id);
        } catch (\Throwable $e) {
            return redirect()->route('admin.books.chapters.edit', [
                'book' => $book,
                'chapter' => $chapter,
            ])->withErrors($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, Chapter $chapter)
    {
        try {
            $chapterNotFound = Chapter::find($chapter)->first();
            if (!$chapterNotFound) {
                return redirect()->route('admin.books.show', $book)->withErrors('Chapter not found');
            }
            $chapter->delete();
            return redirect()->route('admin.books.show', $book);
        } catch (\Throwable $e) {
            return redirect()->route('admin.books.show', $book)->withErrors('Chapter not found');
        }
    }
}
