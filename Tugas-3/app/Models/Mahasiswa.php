<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $fillable = [
        'user_id', 'nim', 'fakultas', 'jurusan', 'no_hp', 'no_wa'
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
