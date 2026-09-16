<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookCategory = BookCategory::all();
        $categories = $bookCategory;
        $bookCategories = $bookCategory;
        return view('book-categorys.index', compact('bookCategory', 'categories', 'bookCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book-categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        BookCategory::create($validateData);
        return redirect()->route('admin.kategori-buku.index')->with('success', 'Kategori buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bookCategory = BookCategory::findOrFail($id);
        $category = $bookCategory;
        return view('book-categorys.edit', compact('bookCategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookCategory = BookCategory::findOrFail($id);

        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $bookCategory->update($validateData);
        return redirect()->route('admin.kategori-buku.index')->with('success', 'Kategori buku telah berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookCategory = BookCategory::findOrFail($id);
        $bookCategory->delete();

        return redirect()->route('admin.kategori-buku.index')->with('success', 'Kategori buku telah berhasil dihapus.');
    }
}