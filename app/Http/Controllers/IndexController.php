<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Page;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\LikeBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $newBooks = Book::orderByDesc('created_at')
            ->limit(8)->get();
        $mostLikedBookIds = LikeBook::select('book_id')
            ->groupBy('book_id')
            ->orderByRaw('COUNT(book_id) DESC')
            ->limit(10)
            ->pluck('book_id');
        $mostLikes = Book::whereIn('id', $mostLikedBookIds)
            ->withCount('Likes')
            ->orderByDesc('likes_count')
            ->get();
        $comings = Book::where('show', false)
            ->limit(10)->get();
        // $mostLikes = Cache::remember('most_liked_books', 1200, function () {
        // return Book::withCount('Likes')
        //     ->orderBy('likes_count', 'desc')
        //     ->limit(10)->get();
        // });
        return view('index', [
            'newBooks' => $newBooks,
            'categories' => $categories,
            'comings' => $comings,
            'mostLikes' => $mostLikes,
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

    public function admin()
    {
        $editor = auth()->user()->hasRole(['Editor', 'editor']);
        $editorAndAdmin = auth()->user()->hasRole(['Editor', 'editor', 'Admin', 'admin']);
        if ($editor) {
            $books = Book::where('user_id', auth()->id())
                ->count();
        } elseif (!$editorAndAdmin) {
            return redirect()->route('index');
        } else {
            $books = Book::select('id')
                ->count();
        }
        $users = User::select('id')
            ->count();
        $roles = Role::select('id')
            ->count();
        $categories = Category::select('id')
            ->count();
        return view('admin.index', [
            'users' => $users,
            'roles' => $roles,
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
