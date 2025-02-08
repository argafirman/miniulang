<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desk', 'deadline', 'kelas_id', 'tipe'];

    public function kelas()
    {
    return $this->belongsTo(Kelas::class);
    }
    public function pengumpulan()
    {
    return $this->hasMany(Pengumpulan::class);
    }
}
