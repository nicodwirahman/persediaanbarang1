<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            background-color: #4a665b;
            padding: 20px;
            color: white;
        }
        .sidebar h4 {
            color: #fff;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #2d3f36;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4>Dashboard Manager</h4>
        <a href="{{ route('dashboard.manager') }}" class="{{ request()->routeIs('dashboard.manager') ? 'active' : '' }}">
            <i class="fa fa-home me-2"></i> Dashboard
        </a>
        <a href="{{ route('manager.barang') }}" class="{{ request()->routeIs('manager.barang') ? 'active' : '' }}">
            <i class="fa fa-box me-2"></i> Stok Barang
        </a>
        <a href="{{ route('manager.transaksibarang') }}" class="{{ request()->routeIs('manager.transaksibarang') ? 'active' : '' }}">
            <i class="fa fa-dollar-sign me-2"></i> Transaksi Barang
        </a>
    </div>

    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>@yield('title', 'Selamat Datang')</h2>
            <a href="{{ route('logout') }}" class="btn btn-danger">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </div>

        @yield('content')
    </div>

</body>
</html>
