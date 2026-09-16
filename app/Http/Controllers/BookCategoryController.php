<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCategory;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BookCategory::withCount('books')->latest()->get();
        return view('book-categorys.index', compact('categories'));
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
        $request->validate([
            'name' => 'required|string|max:255|unique:book_categories,name',
        ], [
            'name.required' => 'Nama kategori buku wajib diisi.',
            'name.string' => 'Nama kategori buku harus berupa teks.',
            'name.max' => 'Nama kategori buku maksimal 255 karakter.',
            'name.unique' => 'Nama kategori buku ini sudah terdaftar.',
        ]);

        BookCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.kategori-buku.index')->with('success', 'Kategori buku berhasil ditambahkan!');
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
