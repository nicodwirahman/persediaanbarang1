<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiBarang;
use App\Models\Barang;

class TransaksiBarangController extends Controller
{
    /* =======================   TAMPILAN LIST   ======================= */
    public function index()
    {
        $transaksis = TransaksiBarang::with('barang')->get();   // relasi belongsTo
        return view('admin.transaksibarang.index', compact('transaksis'));
    }

    /* =======================   FORM TAMBAH   ======================= */
    public function create()
    {
        $barangs = Barang::all();
        return view('admin.transaksibarang.create', compact('barangs'));
    }

    /* =======================   SIMPAN BARU   ======================= */
    public function store(Request $request)
    {
        $request->validate([
            'KdBarang' => 'required|exists:barang,KdBarang',
            'Jumlah'   => 'required|numeric|min:1',
            'Status'   => 'required|in:masuk,keluar',
            'Tanggal'  => 'required|date',
        ]);

        // Hanya admin
        if (session('role') !== 'admin' || !session()->has('user')) {
            return back()->with('error', 'Hanya admin yang bisa melakukan transaksi.');
        }

        DB::transaction(function () use ($request) {

            // ambil barang
            $barang = Barang::where('KdBarang', $request->KdBarang)->lockForUpdate()->first();

            // sesuaikan stok
            if (strtolower($request->Status) === 'keluar') {
                if ($barang->Stok < $request->Jumlah) {
                    throw new \Exception('Stok tidak mencukupi.');
                }
                $barang->Stok -= $request->Jumlah;
            } else {                                  // status = 'masuk'
                $barang->Stok += $request->Jumlah;
            }
            $barang->save();

            // simpan transaksi
            TransaksiBarang::create([
                'KdBarang' => $request->KdBarang,
                'Jumlah'   => $request->Jumlah,
                'Status'   => strtolower($request->Status),
                'Tanggal'  => $request->Tanggal,
                'IdAdmin'  => session('user')->id,
            ]);
        });

        return redirect()->route('transaksibarang.index')
                         ->with('success', 'Transaksi berhasil ditambahkan & stok diperbarui.');
    }

    /* =======================   FORM EDIT   ======================= */
    public function edit($id)
    {
        $trx     = TransaksiBarang::findOrFail($id);
        $barangs = Barang::all();
        return view('admin.transaksibarang.edit', compact('trx', 'barangs'));
    }

    /* =======================   UPDATE DATA   ======================= */
    public function update(Request $request, $id)
    {
        $request->validate([
            'KdBarang' => 'required|exists:barang,KdBarang',
            'Jumlah'   => 'required|numeric|min:1',
            'Status'   => 'required|in:masuk,keluar',
            'Tanggal'  => 'required|date',
        ]);

        DB::transaction(function () use ($request, $id) {

            $trxBaru = TransaksiBarang::findOrFail($id);     // objek yang akan di‑update (belum diubah)
            $barang  = Barang::where('KdBarang', $trxBaru->KdBarang)->lockForUpdate()->first();

            /* 1. Batalkan efek transaksi lama */
            if ($trxBaru->Status === 'keluar') {
                $barang->Stok += $trxBaru->Jumlah;
            } else {
                $barang->Stok -= $trxBaru->Jumlah;
            }

            /* 2. Terapkan efek transaksi baru */
            if ($request->Status === 'keluar') {
                if ($barang->Stok < $request->Jumlah) {
                    throw new \Exception('Stok tidak mencukupi untuk pembaruan.');
                }
                $barang->Stok -= $request->Jumlah;
            } else {
                $barang->Stok += $request->Jumlah;
            }
            $barang->save();

            /* 3. Simpan perubahan transaksi */
            $trxBaru->update([
                'KdBarang' => $request->KdBarang,
                'Jumlah'   => $request->Jumlah,
                'Status'   => strtolower($request->Status),
                'Tanggal'  => $request->Tanggal,
            ]);
        });

        return redirect()->route('transaksibarang.index')
                         ->with('success', 'Transaksi & stok berhasil diperbarui.');
    }

    /* =======================   HAPUS DATA   ======================= */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $trx    = TransaksiBarang::findOrFail($id);
            $barang = Barang::where('KdBarang', $trx->KdBarang)->lockForUpdate()->first();

            // Kembalikan stok akibat transaksi ini
            if ($trx->Status === 'keluar') {
                $barang->Stok += $trx->Jumlah;
            } else {
                $barang->Stok -= $trx->Jumlah;
            }
            $barang->save();

            $trx->delete();
        });

        return redirect()->route('transaksibarang.index')
                         ->with('success', 'Transaksi dihapus & stok dikembalikan.');
    }
}
