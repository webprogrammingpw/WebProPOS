<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('products.index', compact('products'));
        // return view('layouts.master');
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:products',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2048',
        ], [
            'code.required' => 'Kode barang wajid diisi.',
            'code.string' => 'Kode barang berupa string.',
            'code.max' => 'Maksimal panjang kode barang adalah 10 karakter.',
            'code.unique' => 'Kode barang sudah ada.',
            'name.required' => 'Nama barang wajid diisi.',
            'name.string' => 'Nama barang berupa string.',
            'name.max' => 'Maksimal panjang nama barang adalah 255 karakter.',
            'description.string' => 'Deskripsi barang berupa string.',
            'stock.integer' => 'Stok barang berupa angka.',
            'price.required' => 'Harga barang wajid diisi.',
            'price.integer' => 'Harga barang berupa angka.',
            'category_id.required' => 'Kategori wajid diisi.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, webp, bmp.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        try {
            $photo = null;
            if ($request->hasFile('image')) {
                $photo = $this->saveFile($request->name, $request->file('image'));
            }
            Product::create([
                'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description,
                'stock' => $request->stock,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'image' => $photo,
            ]);
            return redirect()->route('products.index')->with('success', 'Barang: <b>' . $request->name . '</b> berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $url = $request->url;
        $request->validate([
            'code' => 'required|string|max:10|unique:products,code,' . ($request->has('code') ? $product->id : 'NULL'),
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2048',
        ], [
            'code.required' => 'Kode barang wajid diisi.',
            'code.string' => 'Kode barang berupa string.',
            'code.max' => 'Maksimal panjang kode barang adalah 10 karakter.',
            'code.unique' => 'Kode barang sudah ada.',
            'name.required' => 'Nama barang wajid diisi.',
            'name.string' => 'Nama barang berupa string.',
            'name.max' => 'Maksimal panjang nama barang adalah 255 karakter.',
            'description.string' => 'Deskripsi barang berupa string.',
            'stock.integer' => 'Stok barang berupa angka.',
            'price.required' => 'Harga barang wajid diisi.',
            'price.integer' => 'Harga barang berupa angka.',
            'category_id.required' => 'Kategori wajid diisi.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, webp, bmp.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        try {
            $photo = $product->image;
            if ($request->hasFile('image')) {
                if ($product->image) {
                    $path = 'storage/products/' . $product->image;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                $photo = $this->saveFile($request->name, $request->file('image'));
            }
            $product->update([
                'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description,
                'stock' => $request->stock,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'image' => $photo,
            ]);
            return redirect($url)->with('success', 'Barang: <b>' . $request->name . '</b> berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error', $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            $path = 'storage/products/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        try {
            $product->delete();
            return redirect()->back()->with('success', 'Barang: <b>' . $product->name . '</b> berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function saveFile($name, $file)
    {
        $path = 'storage/products/';
        $filename = Str::slug($name) . "_" . date('YmdHis') . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);
        return $filename;
    }
}
