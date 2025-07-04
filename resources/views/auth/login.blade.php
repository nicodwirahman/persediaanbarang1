<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background-color: #fdf3ff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #2e443f;
            font-size: 28px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            background-color: #6b8f71;
            color: white;
            border: none;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input::placeholder {
            color: white;
        }

        .form-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: black;
        }

        .btn {
            background-color: #6b8f71;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #5c7c63;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    @if (session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group form-icon">
            <i class="fa fa-user"></i>
            <input type="text" name="Username" placeholder="Masukkan Username" required>
        </div>

        <div class="form-group form-icon">
            <i class="fa fa-lock"></i>
            <input type="password" name="Password" placeholder="Masukkan Password" required>
        </div>

        <button type="submit" class="btn">Login</button>
    </form>
</div>

</body>
</html>
