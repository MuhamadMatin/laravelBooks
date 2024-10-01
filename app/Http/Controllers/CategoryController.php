<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            Category::create($validated);
            return redirect()->route('admin.categories.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.categories.create')->withErrors('Duplicate name' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);
            $category->update($validated);
            return redirect()->route('admin.categories.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.categories.edit')->withErrors('Duplicate name');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $categoryNotFound = Category::find($category)->first();
            if (!$categoryNotFound) {
                return redirect()->route('admin.categories.index')->withErrors('Name not found');
            }
            $category->delete();
            return redirect()->route('admin.categories.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.categories.index')->withErrors('Name not found');
        }
    }
}
