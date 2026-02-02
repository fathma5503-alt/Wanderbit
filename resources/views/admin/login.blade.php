<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - WanderBit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #6998ab;
            color: white;
        }
        .card {
            background: #1a374d;
            border: none;
            border-radius: 10px;
            color: white;
        }
        .btn-primary {
            background-color: #192733;
            border: none;
        }
        .w-100:hover {
            background-color: #123456;
            color: white;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4" style="width:400px;">
        <h3 class="text-center mb-3">Admin Login</h3>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-light w-100">Login</button>
        </form>
        <p class="text-center mt-3"><a href="{{ route('admin.register') }}" class="text-light">Register New Admin</a></p>
    </div>
</body>
</html>
