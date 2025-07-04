<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persediaan Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
        }
        .sidebar h4 {
            color: #fff;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 8px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #34495e;
            padding-left: 10px;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4>Menu Admin</h4>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('barang.index') }}">Kelola Barang</a>
        <a href="{{ route('kategori.index') }}">Kelola Kategori</a>
        <a href="{{ route('transaksibarang.index') }}">Kelola Transaksi</a>
    </div>

    <div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>@yield('title')</h2>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>

    @yield('content')
</div>

</body>
</html>