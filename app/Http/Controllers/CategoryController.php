<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'nullable|string',
        ], [
            'name.required' => 'Nama kategori wajid diisi.',
            'name.string' => 'Nama kategori berupa string.',
            'name.max' => 'Maksimal panjang nama kategori adalah 255 karakter.',
            'description.string' => 'Deskripsi kategori berupa string.',
        ]);
        try {
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('success', 'Kategori: <b>' . $request->name . '</b> berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $url = $request->url;
        $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'nullable|string',
        ], [
            'name.required' => 'Nama kategori wajid diisi.',
            'name.string' => 'Nama kategori berupa string.',
            'name.max' => 'Maksimal panjang nama kategori adalah 255 karakter.',
            'description.string' => 'Deskripsi kategori berupa string.',
        ]);
        try {
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return redirect($url)->with('success', 'Kategori: <b>' . $request->name . '</b> berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Kategori: <b>' . $category->name . '</b> berhasil dihapus.');
    }
}
