<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil semua data produk dari database
        $products = Product::latest()->paginate(10);

        // Menampilkan view dengan data produk
        return view('tampilan.index', compact('products'));
    }
    public function create()
    {
        return view('tampilan.tambahproduk');
    }
    public function store(Request $minta): RedirectResponse
    {
        // Validasi input
        $minta->validate([
            'nama' => 'required',
            'deskripsi' => 'required|min:5',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        // Simpan data produk baru
        Product::create([
            'title' => $minta->nama,
            'description' => $minta->deskripsi,
            'price' => $minta->harga,
            'stock' => $minta->stok
        ]);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }
    public function edit(string $id)
    {
        // Mengambil data produk berdasarkan ID
        $products = Product::findOrFail($id);

        // Menampilkan view edit dengan data produk
        return view('tampilan.editproduk', compact('products'));
    }
    public function update(Request $minta, string $id): RedirectResponse
    {
        // Validasi input
        $minta->validate([
            'nama' => 'required',
            'deskripsi' => 'required|min:5',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        // Mengambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Update data produk
        $product->update([
            'title' => $minta->nama,
            'description' => $minta->deskripsi,
            'price' => $minta->harga,
            'stock' => $minta->stok
        ]);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }
    public function destroy(string $id): RedirectResponse
    {
        // Mengambil data produk berdasarkan ID
        $products = Product::findOrFail($id);

        // Hapus data produk
        $products->delete();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }

    public function baru()
    {
        return view('tampilan.baru');
    }
}
