<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'KdBarang';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'KdBarang', 'NamaBarang', 'Stok', 'IdKategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'IdKategori', 'IdKategori');
    }
}
