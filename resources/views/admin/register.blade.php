<!DOCTYPE html>
<html>
<head>
    <title>Admin Register - WanderBit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #6998ab; color:white; }
       .w-100:hover {
            background-color: #123456;
            color: white;
        }
        .card { background: #192733; border:none; border-radius:10px; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4 cd" style="width:400px;">
        <h3 class="text-center mb-3">Admin Register</h3>
        @if($errors->any())
            <div class="alert alert-danger">{{ implode(', ', $errors->all()) }}</div>
        @endif
        <form action="{{ route('admin.register.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button class="btn btn-light w-100">Register</button>
        </form>
        <p class="text-center mt-3"><a href="{{ route('admin.login') }}" class="text-light">Already have account? Login</a></p>
    </div>
</body>
</html>
