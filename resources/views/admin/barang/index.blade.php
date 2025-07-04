@extends('layouts.master')

@section('title', 'Kelola Barang')

@section('content')
<a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">+ tambah</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $index => $barang)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $barang->NamaBarang }}</td>
            <td>{{ $barang->Stok }}</td>
            <td>{{ $barang->kategori->NamaKategori ?? '-' }}</td>
            <td>
                <a href="{{ route('barang.edit', $barang->KdBarang) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('barang.destroy', $barang->KdBarang) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
