<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auth Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Welcome to the Auth Panel</h2>
        <div class="text-center mb-3">
            <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-success mx-2">Register</a>
        </div>
        @yield('content')
    </div>
</body>
</html>
