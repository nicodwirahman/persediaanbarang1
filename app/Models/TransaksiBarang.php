<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiBarang extends Model
{
    protected $table = 'transaksibarang';
    protected $primaryKey = 'IdTransaksi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'IdTransaksi', 'Jumlah', 'Status', 'Tanggal', 'KdBarang', 'IdAdmin'
    ];

    public function barang()
{
    return $this->belongsTo(Barang::class, 'KdBarang', 'KdBarang');
    
}
public function admin()
{
    return $this->belongsTo(Admin::class, 'IdAdmin', 'IdAdmin');
}
}
