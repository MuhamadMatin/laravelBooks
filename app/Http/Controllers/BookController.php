<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BookController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'role_or_permission:view_book|view_any_book|create_book|edit_book|delete_book',
            new Middleware('permission:view_book|view_any_book', only: ['index']),
            new Middleware('permission:create_book', only: ['create', 'store']),
            new Middleware('permission:edit_book', only: ['edit', 'update']),
            new Middleware('permission:delete_book', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(15);
        return view('admin.books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.add', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try {
            $user_id = auth()->user()->id;
            $validated = $request->validated();
            $validated['user_id'] = $user_id;
            $validated['slug'] = Str::slug($validated['name']);
            if ($request->hasFile('image')) {
                $originalName = $request->file('image')
                    ->getClientOriginalName();

                $image_path = $request->file('image')
                    ->storeAs('image-books', $originalName, 'public');

                $validated['image'] = $image_path;
            }

            Book::create($validated);
            return redirect()->route('manage.books.index');
        } catch (\Throwable $e) {
            return redirect()->route('manage.books.create')->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load('chapters.pages');

        return view('admin.books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            if ($request->hasFile('image')) {
                $originalName = $request->file('image')
                    ->getClientOriginalName();

                $image_path = $request->file('image')
                    ->storeAs('image-books', $originalName, 'public');

                $validated['image'] = $image_path;
            }
            if (!$request->has('show')) {
                $validated['show'] = false;
            }
            $validated['user_id'] = $book->user_id;

            $book->update($validated);
            return redirect()->route('manage.books.show', $book->id);
        } catch (\Throwable $e) {
            return redirect()->route('manage.books.edit', $book)->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $bookNotFound = Book::find($book)->first();
            if (!$bookNotFound) {
                return redirect()->route('manage.books.show', $book)->withErrors('Book not found');
            }
            $book->delete();
            return redirect()->route('manage.books.index');
        } catch (\Throwable $e) {
            return redirect()->route('manage.books.show', $book->id)->withErrors('Book not found');
        }
    }
}
