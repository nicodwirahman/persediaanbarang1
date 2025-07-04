<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiBarang;
use App\Models\Barang;


class ManagerController extends Controller
{
    private function onlyManager()
    {
        if (session('role') !== 'manager') {
            return redirect('/login')->with('error', 'Akses hanya untuk Manager');
        }
    }

   public function dashboard()
{
    if (session('role') !== 'manager') {
        return redirect('/')->with('error', 'Akses ditolak');
    }

    $totalBarang = DB::table('barang')->count();
    $totalTransaksi = DB::table('transaksibarang')->count();

    return view('manager.dashboard', compact('totalBarang', 'totalTransaksi'));
}

    public function barang()
    {
        if ($this->onlyManager()) return $this->onlyManager();
        

        $barang = DB::table('barang')->get();
        $barang = \App\Models\Barang::with('kategori')->get();
        return view('manager.barang', compact('barang'));
    }

    

public function transaksibarang()
{
    $transaksi = TransaksiBarang::with('barang')->get();
    return view('manager.transaksibarang', compact('transaksi'));
}

    
}
