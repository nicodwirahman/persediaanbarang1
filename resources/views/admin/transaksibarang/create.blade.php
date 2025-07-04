@extends('layouts.master')

@section('content')
    <h2>Tambah Transaksi Barang</h2>

    <form action="{{ route('transaksibarang.store') }}" method="POST">
    @csrf

    <label>Kode Barang</label>
    <select name="KdBarang" required>
        <option value="">-- Pilih Barang --</option>
        @foreach($barangs as $barang)
            <option value="{{ $barang->KdBarang }}">{{ $barang->NamaBarang }}</option>
        @endforeach
    </select>

    <label>Jumlah</label>
    <input type="number" name="Jumlah" required>

    <label>Status</label>
    <select name="Status" required>
        <option value="">-- Pilih Status --</option>
        <option value="masuk">Masuk</option>
        <option value="keluar">Keluar</option>
    </select>

    <label>Tanggal</label>
    <input type="date" name="Tanggal" required>

    <button type="submit">Simpan</button>
</form>
@endsection