@extends('layouts.master')

@section('content')
<h2>Kelola Transaksi Barang</h2>
<a href="{{ route('transaksibarang.create') }}" class="btn btn-primary mb-3">+ tambah</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $index => $trx)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $trx->Jumlah }}</td>
            <td>{{ $trx->Status }}</td>
                        <td>{{ $trx->Tanggal }}</td>
            <td>
                <a href="{{ route('transaksibarang.edit', $trx->IdTransaksi) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('transaksibarang.destroy', $trx->IdTransaksi) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
