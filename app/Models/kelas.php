<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama'];

    public function tugas()
    {
    return $this->hasMany(Tugas::class);
    }

    public function materi()
    {
    return $this->hasMany(Materi::class);
    }
}