@extends('layouts.master')

@section('content')
    <h2>Edit Barang</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $barang->KdBarang) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="KdBarang" class="form-label">Kode Barang</label>
            <input type="text"
                   name="KdBarang"
                   id="KdBarang"
                   class="form-control"
                   value="{{ old('KdBarang', $barang->KdBarang) }}"
                   readonly>
        </div>

        <div class="mb-3">
            <label for="NamaBarang" class="form-label">Nama Barang</label>
            <input type="text"
                   name="NamaBarang"
                   id="NamaBarang"
                   class="form-control"
                   value="{{ old('NamaBarang', $barang->NamaBarang) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="Stok" class="form-label">Stok</label>
            <input type="number"
                   name="Stok"
                   id="Stok"
                   class="form-control"
                   value="{{ old('Stok', $barang->Stok) }}"
                   min="0"
                   required>
        </div>

        <div class="mb-3">
            <label for="IdKategori" class="form-label">Kategori</label>
            <select name="IdKategori" id="IdKategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->IdKategori }}"
                        {{ old('IdKategori', $barang->IdKategori) == $kategori->IdKategori ? 'selected' : '' }}>
                        {{ $kategori->NamaKategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
