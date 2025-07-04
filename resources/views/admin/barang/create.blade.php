@extends('layouts.master')

@section('content')
    <h2>Tambah Barang</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="KdBarang" class="form-label">Kode Barang</label>
            <input type="text" name="KdBarang" id="KdBarang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="NamaBarang" class="form-label">Nama Barang</label>
            <input type="text" name="NamaBarang" id="NamaBarang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Stok" class="form-label">Stok</label>
            <input type="number" name="Stok" id="Stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="IdKategori" class="form-label">Kategori</label>
            <select name="IdKategori" id="IdKategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->IdKategori }}">{{ $k->NamaKategori }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
