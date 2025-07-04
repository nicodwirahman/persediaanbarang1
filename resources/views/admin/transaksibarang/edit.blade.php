@extends('layouts.master')

@section('content')
    <h2>Edit Transaksi Barang</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksibarang.update', $trx->IdTransaksi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="KdBarang" class="form-label">Nama Barang</label>
            <select name="KdBarang" id="KdBarang" class="form-select" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->KdBarang }}"
                        {{ $barang->KdBarang == $trx->KdBarang ? 'selected' : '' }}>
                        {{ $barang->NamaBarang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Jumlah" class="form-label">Jumlah</label>
            <input type="number"
                   name="Jumlah"
                   id="Jumlah"
                   class="form-control"
                   value="{{ $trx->Jumlah }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select name="Status" id="Status" class="form-select" required>
                <option value="masuk" {{ $trx->Status == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ $trx->Status == 'keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Tanggal" class="form-label">Tanggal</label>
            <input type="date"
                   name="Tanggal"
                   id="Tanggal"
                   class="form-control"
                   value="{{ $trx->Tanggal }}"
                   required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('transaksibarang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
