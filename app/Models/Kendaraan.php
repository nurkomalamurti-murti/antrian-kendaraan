<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'user_id',
        'nomor_polisi',
        'jenis_kendaraan',
        'nama_pemilik'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function antrian()
    {
        return $this->hasMany(Antrian::class);
    }
}
