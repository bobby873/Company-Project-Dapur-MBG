<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. Menampilkan Halaman Daftar Produk/Menu Makanan di Admin
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    // 2. Menampilkan Form Tambah Menu Baru
    public function create()
    {
        return view('admin.products.create');
    }

    // 3. Memproses Penyimpanan Menu Baru ke Database (Validasi & Upload Gambar)
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|max:255',
            'total_porsi' => 'required|integer|min:1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validasi file gambar
        ], [
            'name.required'        => 'Nama menu wajib diisi!',
            'total_porsi.required' => 'Jumlah porsi wajib diisi!',
            'total_porsi.integer'  => 'Jumlah porsi harus berupa angka!',
            'image.image'          => 'File harus berupa gambar!',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'        => $request->name,
            'total_porsi' => $request->total_porsi,
            'image'       => $imagePath,
        ]);

        return redirect('/admin/products')->with('success', 'Menu makanan berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit Menu
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // 5. Memproses Pembaruan Data Menu Makanan
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|max:255',
            'total_porsi' => 'required|integer|min:1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->name = $request->name;
        $product->total_porsi = $request->total_porsi;
        $product->save();

        return redirect('/admin/products')->with('success', 'Menu makanan berhasil diperbarui!');
    }

    // 6. Menghapus Menu Makanan beserta Gambarnya
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect('/admin/products')->with('success', 'Menu makanan berhasil dihapus!');
    }
}
