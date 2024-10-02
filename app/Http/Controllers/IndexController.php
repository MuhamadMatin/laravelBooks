<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Page;
use App\Models\Chapter;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newBooks = Book::orderByDesc('created_at')->limit(8)->get();
        $categories = Category::all();
        $comings = Book::where('show', false)->limit(10)->get();
        return view('index', [
            'newBooks' => $newBooks,
            'categories' => $categories,
            'comings' => $comings
        ]);
    }

    public function home()
    {
        $books = Book::all()->sortByDesc('id');
        $categories = Category::all();
        return view('books.index', [
            'books' => $books,
            'categories' => $categories,
        ]);
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
    public function indexShowBook(Book $book)
    {
        $book->load('chapters.pages');

        return view('books.show', [
            'book' => $book,
        ]);
    }

    public function indexShowChapter($book, Chapter $chapter)
    {
        $book = Book::where('slug', $book)->firstOrFail()
            ->load('pages');

        return view('books.chapter.show', [
            'book' => $book,
            'chapter' => $chapter,
        ]);
    }

    public function indexShowPage($book, $chapter, Page $page)
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
