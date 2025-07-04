@extends('layouts.master')

@section('content')
    <h2>Edit Kategori</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.update', $kategori->IdKategori) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="NamaKategori" class="form-label">Nama Kategori</label>
            <input type="text"
                   name="NamaKategori"
                   id="NamaKategori"
                   class="form-control"
                   value="{{ old('NamaKategori', $kategori->NamaKategori) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
