<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
<div class="card p-4 shadow-sm" style="width: 380px;">
    <h4 class="mb-3 text-center">Login Perpustakaan</h4>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="admin@perpus.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>
    <div class="mt-3 small text-muted">
        <strong>Akun Tes:</strong><br>
        Admin: <code>admin@perpus.com</code> / <code>password</code><br>
        User: <code>user@perpus.com</code> / <code>password</code>
    </div>
</div>
</body>
</html>