<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Admin Panel</h1>
        <hr>

        <!-- Navigation Tabs -->
        <nav class="mb-4">
            <ul class="nav nav-tabs">
                @can('view products')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('admin.products') }}">Products</a>
                </li>
                @endcan
                @can('view categories')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('admin.categories') }}">Categories</a>
                </li>
                @endcan
            </ul>
        </nav>

        <!-- Content -->
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>
