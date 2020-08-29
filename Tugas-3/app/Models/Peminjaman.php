<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "pinjaman";
    protected $fillable = [
        'mahasiswa_id', 'buku_id', 'tanggal_peminjaman', 'tanggal_batas_akhir_peminjaman', 'tanggal_pengembalian', 'status_ontime'
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
