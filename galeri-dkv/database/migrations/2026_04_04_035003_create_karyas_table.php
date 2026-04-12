<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('karyas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
        $table->string('nama_siswa'); 
        $table->string('judul_karya');
        $table->text('deskripsi');
        
        // Tambahan baru: Tahun Ajaran
        $table->string('tahun_ajaran'); 
        
        // Ganti nama dari file_gambar jadi file_karya biar universal
        $table->string('file_karya'); 
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};
