<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
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
    // Fungsi untuk menampilkan semua karya dan filter kategori
    public function galeri(Request $request)
    {
        // Ambil semua daftar kategori untuk dijadikan tombol filter
        $kategoris = DB::table('kategoris')->get();

        // Siapkan query dasar untuk mengambil karya
        $query = DB::table('karyas')
                    ->join('kategoris', 'karyas.kategori_id', '=', 'kategoris.id')
                    ->select('karyas.*', 'kategoris.nama_kategori')
                    ->orderBy('karyas.created_at', 'desc');

        // Jika ada pengunjung yang menekan tombol filter kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategoris.id', $request->kategori);
        }

        // Eksekusi query
        $karyas = $query->get();

        return view('galeri', compact('karyas', 'kategoris'));
    }
    // Fungsi untuk menampilkan halaman detail satu karya
    public function detail($id)
    {
        $karya = DB::table('karyas')
                    ->join('kategoris', 'karyas.kategori_id', '=', 'kategoris.id')
                    ->select('karyas.*', 'kategoris.nama_kategori')
                    ->where('karyas.id', $id)
                    ->first();

        // Kalau iseng ada yang masukin ID ngasal di URL, tendang balik ke galeri
        if (!$karya) {
            return redirect('/galeri')->with('error', 'Karya tidak ditemukan.');
        }

        return view('detail', compact('karya'));
    }
}