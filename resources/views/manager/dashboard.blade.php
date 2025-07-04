@extends('manager.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-box"></i> Total Barang</h5>
                    <p class="card-text display-6">{{ $totalBarang }}</p>
                    <a href="{{ route('manager.barang') }}" class="text-white text-decoration-underline">View more</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-box"></i> Total Transaksi</h5>
                    <p class="card-text display-6">{{ $totalTransaksi }}</p>
                    <a href="{{ route('manager.transaksibarang') }}" class="text-white text-decoration-underline">View more</a>
                </div>
            </div>
        </div>
    </div>
@endsection
