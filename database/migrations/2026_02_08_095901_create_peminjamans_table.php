<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id('id_peminjaman'); 
            $table->foreignId('id_siswa')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_alat')->constrained('alats')->onDelete('cascade');
            $table->foreignId('id_petugas')->nullable()->constrained('users');
            $table->foreignId('id_admin')->nullable()->constrained('users');

            $table->integer('jumlah'); 
            $table->date('tanggal_pinjam');
            $table->date('tengat_kembali');
            $table->date('tanggal_kembali')->nullable();
            $table->string('status')->default('pending'); // Contoh: pending, dipinjam, kembali
            $table->string('dokumentasi')->nullable(); 
            $table->integer('denda')->default(0);
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};