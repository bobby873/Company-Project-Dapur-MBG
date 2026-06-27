<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; // <-- Sudah masuk dengan aman
use App\Models\Product;

class AdminController extends Controller
{
    // 1. Menampilkan Halaman Dashboard Utama Admin beserta Ringkasan Data
    public function dashboard()
{
    $articles = Article::orderBy('created_at', 'desc')->get();

    // Hitung total data secara dinamis dari database
    $totalArticles = Article::count();
    $totalProducts = Product::count(); // <-- Diubah menjadi dinamis mengambil dari database!

    $totalGallery  = 24; // Dummy data galeri

    return view('admin.dashboard', compact('articles', 'totalArticles', 'totalProducts', 'totalGallery'));
}

    // 2. Menampilkan Form Tambah Artikel Baru
    public function create()
    {
        return view('admin.create');
    }

    // 3. Memproses Penyimpanan Artikel Baru
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title'        => $request->title,
            'content'      => $request->content,
            'image'        => $imagePath,
            'published_at' => now(),
        ]);

        return redirect('/admin/dashboard')->with('success', 'Artikel berhasil diterbitkan!');
    }

    // 4. Menampilkan Form Edit Artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.edit', compact('article'));
    }

    // 5. Memproses Pembaruan Data Artikel
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect('/admin/dashboard')->with('success', 'Artikel berhasil diperbarui!');
    }

    // 6. Menghapus Artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect('/admin/dashboard')->with('success', 'Artikel berhasil dihapus!');
    }

    // 7. Fungsi Cetak Laporan PDF (Fitur Baru UAS)
    public function downloadReport()
    {
        // Mengambil semua data artikel dari database
        $articles = Article::orderBy('created_at', 'desc')->get();

        // Menyiapkan view khusus laporan bernama report-pdf
        $pdf = Pdf::loadView('admin.report-pdf', compact('articles'));

        // Mengalirkan dokumen PDF ke browser tab baru
        return $pdf->stream('Laporan_Artikel_Dapur_MBG.pdf');
    }
}
