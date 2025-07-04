@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Total Barang</h5>
                <p class="card-text">{{ $totalBarang }}</p>
                <a href="{{ route('barang.index') }}" class="btn btn-outline-primary">View more</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Total Transaksi</h5>
                <p class="card-text">{{ $totalTransaksi }}</p>
                <a href="{{ route('transaksibarang.index') }}" class="btn btn-outline-primary">View more</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Total Kategori</h5>
                <p class="card-text">{{ $totalKategori }}</p>
                <a href="{{ route('kategori.index') }}" class="btn btn-outline-primary">View more</a>
            </div>
        </div>
    </div>
</div>
@endsection