<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = ['kelas_id', 'judul', 'deskripsi', 'batas_waktu'];

    public function kelas()
    {
    return $this->belongsTo(Kelas::class);
    }

    public function pengumpulan()
    {
    return $this->hasMany(Pengumpulan::class);
    }
}