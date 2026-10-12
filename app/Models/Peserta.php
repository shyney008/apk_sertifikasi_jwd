<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'email',
        'no_hp',
        'alamat',
        'skema_id',
        'tanggal_daftar',
    ];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}