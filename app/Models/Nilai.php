<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['pengumpulan_id', 'skor'];

    public function pengumpulan()
    {
    return $this->belongsTo(Pengumpulan::class);
    }
}