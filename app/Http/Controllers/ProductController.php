<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Halaman Dashboard (Beranda)
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalStock = Product::sum('stock');

        return view('dashboard', compact('totalProducts', 'totalStock'));
    }

    // 2. Halaman Daftar Produk & Pencarian
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();
        return view('products.index', compact('products'));
    }

    // 3. Halaman Form Tambah Produk
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // 4. Proses Simpan Produk Baru
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Sip, barang baru udah masuk gudang!');
    }

    // 5. Halaman Detail Produk
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // 6. Halaman Form Edit Produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // 7. Proses Update Produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Data dagangan berhasil diubah!');
    }

    // 8. Proses Hapus Produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Barang udah dihapus dari daftar.');
    }
}