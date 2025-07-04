<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // pastikan sesuai dengan nama tabel kamu
    protected $primaryKey = 'IdKategori';
    public $timestamps = false;

    protected $fillable = ['NamaKategori'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'IdKategori', 'IdKategori');
    }
}