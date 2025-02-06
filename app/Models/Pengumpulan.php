<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulan';
    protected $fillable = ['tugas_id', 'user_id', 'jawaban', 'file_path'];

    public function tugas()
    {
    return $this->belongsTo(Tugas::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function nilai()
    {
    return $this->hasOne(Nilai::class);
    }
}