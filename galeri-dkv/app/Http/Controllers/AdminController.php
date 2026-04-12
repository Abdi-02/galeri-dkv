<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk akses database langsung
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Fungsi untuk menampilkan halaman Beranda Statistik
    public function index()
    {
        // Menghitung total data di dalam database
        $totalKarya = DB::table('karyas')->count();
        $totalKategori = DB::table('kategoris')->count();
        $totalAdmin = DB::table('users')->count();

        // Mengirim data hitungan tadi ke file tampilan beranda
        return view('admin.beranda', compact('totalKarya', 'totalKategori', 'totalAdmin'));
    }

    // Fungsi untuk menampilkan halaman form upload
    public function tampilUpload()
    {
        // Ambil data kategori dari database untuk ditampilkan di dropdown form
        $kategoris = DB::table('kategoris')->get();
        return view('admin.upload', compact('kategoris'));
    }

    // Fungsi untuk memproses data dan file yang dikirim dari form
    public function prosesUpload(Request $request)
    {
        // 1. Validasi file dan teks (maksimal 20MB untuk video/gambar)
        $request->validate([
            'judul_karya' => 'required',
            'kategori_id' => 'required',
            'nama_siswa' => 'required',
            'deskripsi' => 'required',
            'tahun_ajaran' => 'required',
            'file_karya' => 'required|mimes:jpg,jpeg,png,mp4,mov|max:20480', 
        ]);

        // 2. Simpan file ke dalam folder 'storage/app/public/karya_files'
        $path_file = $request->file('file_karya')->store('karya_files', 'public');

        // 3. Simpan nama file dan data teks ke database tabel 'karyas'
        DB::table('karyas')->insert([
            'judul_karya' => $request->judul_karya,
            'kategori_id' => $request->kategori_id,
            'nama_siswa' => $request->nama_siswa,
            'deskripsi' => $request->deskripsi,
            'tahun_ajaran' => $request->tahun_ajaran,
            'file_karya' => $path_file,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Kembali ke halaman form dengan pesan sukses
        return back()->with('sukses', 'Mantap! Karya berhasil dipublikasikan.');
    }

    // Fungsi untuk menampilkan halaman Kelola Karya
    public function kelolaKarya()
    {
        // Ambil data karya dan gabungkan dengan tabel kategori biar nama kategorinya ikut terbawa
        $karyas = DB::table('karyas')
                    ->join('kategoris', 'karyas.kategori_id', '=', 'kategoris.id')
                    ->select('karyas.*', 'kategoris.nama_kategori')
                    ->orderBy('karyas.created_at', 'desc') // Urutkan dari yang paling baru
                    ->get();

        return view('admin.kelola', compact('karyas'));
    }

    // Fungsi untuk menghapus karya beserta file fisiknya
    public function hapusKarya($id)
    {
        // 1. Cari data karya berdasarkan ID yang diklik
        $karya = DB::table('karyas')->where('id', $id)->first();

        if ($karya) {
            // 2. Cek apakah file fisiknya ada di dalam folder storage? Kalau ada, hapus!
            if (Storage::disk('public')->exists($karya->file_karya)) {
                Storage::disk('public')->delete($karya->file_karya);
            }

            // 3. Setelah file fisiknya musnah, baru hapus datanya dari tabel database
            DB::table('karyas')->where('id', $id)->delete();

            return back()->with('sukses', 'Sip! Data dan file karya berhasil dihapus permanen.');
        }

        return back()->with('error', 'Waduh, data karya tidak ditemukan.');
    }

    // Fungsi untuk menampilkan form edit dengan data yang sudah ada
    public function tampilEdit($id)
    {
        $karya = DB::table('karyas')->where('id', $id)->first();
        $kategoris = DB::table('kategoris')->get();
        
        if (!$karya) {
            return redirect('/kelola-karya')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.edit', compact('karya', 'kategoris'));
    }

    // Fungsi untuk memproses perubahan data
    public function prosesEdit(Request $request, $id)
    {
        $request->validate([
            'judul_karya' => 'required',
            'kategori_id' => 'required',
            'nama_siswa' => 'required',
            'deskripsi' => 'required',
            'tahun_ajaran' => 'required',
            'file_karya' => 'nullable|mimes:jpg,jpeg,png,mp4,mov|max:20480', // nullable karena boleh nggak ganti file
        ]);

        $karya = DB::table('karyas')->where('id', $id)->first();

        // Data dasar yang pasti di-update
        $dataUpdate = [
            'judul_karya' => $request->judul_karya,
            'kategori_id' => $request->kategori_id,
            'nama_siswa' => $request->nama_siswa,
            'deskripsi' => $request->deskripsi,
            'tahun_ajaran' => $request->tahun_ajaran,
            'updated_at' => now(),
        ];

        // Mengecek apakah ada file baru yang diupload
        if ($request->hasFile('file_karya')) {
            // Hapus file lama dari storage
            if (Storage::disk('public')->exists($karya->file_karya)) {
                Storage::disk('public')->delete($karya->file_karya);
            }
            // Simpan file baru
            $path_file = $request->file('file_karya')->store('karya_files', 'public');
            $dataUpdate['file_karya'] = $path_file; // Masukkan nama file baru ke data update
        }

        // Eksekusi update ke database
        DB::table('karyas')->where('id', $id)->update($dataUpdate);

        return redirect('/kelola-karya')->with('sukses', 'Sip! Data karya berhasil diperbarui.');
    }

    // Fungsi untuk menampilkan halaman pengaturan
    public function pengaturan()
    {
        return view('admin.pengaturan');
    }

    // Fungsi untuk memproses update nama dan password
    public function updatePengaturan(Request $request)
    {
        // Ambil data admin yang sedang login saat ini
        $user = auth()->user();

        // Validasi inputan form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:6' // Boleh kosong, tapi kalau diisi minimal 6 karakter
        ]);

        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now(),
        ];

        // Jika form password diisi, enkripsi dan masukkan ke data update
        if ($request->filled('password')) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        // Eksekusi update ke database menggunakan ID admin tersebut
        DB::table('users')->where('id', $user->id)->update($dataUpdate);

        return back()->with('sukses', 'Mantap! Profil akun admin berhasil diperbarui.');
    }
}