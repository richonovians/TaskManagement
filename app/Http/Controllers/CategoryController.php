<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('categories.show', compact('categories'));
    }

    public function detail($id)
    {
        $category = Category::findOrFail($id); // Mencari kategori berdasarkan ID atau gagal
        return view('categories.detail', compact('category')); // Mengirimkan data ke view
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
        ]);

        // Membuat dan menyimpan kategori baru
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->save();

        // Redirect kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('categories.show')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
            'description' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.show')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.show')->with('success', 'Category deleted successfully.');
    }
}
