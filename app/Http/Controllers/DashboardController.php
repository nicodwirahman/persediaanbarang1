<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\TransaksiBarang;
use App\Models\Kategori; 

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count(); // hitung jumlah barang
        $totalTransaksi = TransaksiBarang::count(); // hitung jumlah transaksi
        $totalKategori = Kategori::count(); // hitung jumlah kategori

        return view('admin.dashboard', compact('totalBarang', 'totalTransaksi', 'totalKategori'));
    }
}
