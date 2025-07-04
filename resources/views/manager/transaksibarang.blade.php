@extends('manager.layout')

@section('title', 'Daftar Transaksi Barang')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->barang->NamaBarang ?? '-' }}</td>
                        <td>{{ $item->Jumlah }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>{{ $item->Tanggal }}</td>
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
