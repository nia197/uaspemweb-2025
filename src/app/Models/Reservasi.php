<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'no_hp',
        'tanggal',
        'jam',
        'layanan_id',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
