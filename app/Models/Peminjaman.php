<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_siswa', 
        'id_alat', 
        'id_petugas', 
        'id_admin', 
        'jumlah', 
        'tanggal_pinjam', 
        'tengat_kembali', 
        'status', 
        'dokumentasi'
    ];
}