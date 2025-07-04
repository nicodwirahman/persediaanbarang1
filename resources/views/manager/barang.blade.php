@extends('manager.layout')

@section('title', 'Stok Barang')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Barang</h5>
            <table class="table table-bordered mt-3">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->KdBarang }}</td>
                            <td>{{ $item->NamaBarang }}</td>
                            <td>{{ $item->Stok }}</td>
                            <td>{{ $item->IdKategori }}</td> {{-- bisa diganti nanti jadi nama kategori --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
