@extends('layouts.master')

@section('title', 'Kelola Kategori')

@section('content')
<a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">+ tambah</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $index => $kategori)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $kategori->NamaKategori }}</td>
            <td>
                <a href="{{ route('kategori.edit', $kategori->IdKategori) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori->IdKategori) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
