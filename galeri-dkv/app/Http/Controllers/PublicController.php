<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    // 1. Fungsi untuk halaman Beranda (Home)
    public function index()
    {
        // Ambil 3 karya terbaru untuk ditampilkan di Beranda
        $karyas = DB::table('karyas')
                    ->join('kategoris', 'karyas.kategori_id', '=', 'kategoris.id')
                    ->select('karyas.*', 'kategoris.nama_kategori')
                    ->orderBy('karyas.created_at', 'desc')
                    ->take(3) // Batasi cuma 3 kartu biar rapi di beranda
                    ->get();

        return view('welcome', compact('karyas'));
    }

    // 2. Fungsi untuk menampilkan semua karya, filter kategori, dan pencarian
    public function galeri(Request $request)
    {
        $kategoris = DB::table('kategoris')->get();

        $query = DB::table('karyas')
                    ->join('kategoris', 'karyas.kategori_id', '=', 'kategoris.id')
                    ->select('karyas.*', 'kategoris.nama_kategori')
                    ->orderBy('karyas.created_at', 'desc');

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('kategoris.id', $request->kategori);
        }

        // Fitur Pencarian berdasarkan Judul atau Nama Siswa
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function($q) use ($keyword) {
                $q->where('karyas.judul_karya', 'like', "%$keyword%")
                  ->orWhere('karyas.nama_siswa', 'like', "%$keyword%");
            });
        }

        // Pakai paginate() alih-alih get() untuk membagi halaman (6 item per halaman)
        $karyas = $query->paginate(6)->withQueryString();

        return view('galeri', compact('karyas', 'kategoris'));
    }

    // 3. Fungsi BARU untuk menampilkan halaman detail satu karya
    public function detail($id)
    {
        // Ambil satu data karya berdasarkan ID yang dipilih
        $karya = DB::table('karyas')
                    ->join('kategoris', 'karyas.kategori_id', '=', 'kategoris.id')
                    ->select('karyas.*', 'kategoris.nama_kategori')
                    ->where('karyas.id', $id)
                    ->first();

        // Jika data tidak ditemukan, kembalikan ke halaman 404
        if (!$karya) {
            abort(404);
        }

        return view('detail', compact('karya'));
    }
}