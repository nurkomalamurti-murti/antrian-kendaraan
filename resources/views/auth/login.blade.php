<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login - Antrian Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card mx-auto shadow p-4" style="max-width: 400px;">

        <h3 class="text-center mb-4">Login</h3>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Login</button>

        </form>

        <p class="text-center mt-3">
            Belum punya akun?
            <a href="{{ route('register') }}">Registrasi</a>
        </p>

    </div>

</div>

</body>
</html>