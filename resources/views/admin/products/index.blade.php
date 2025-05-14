@extends('layouts.app')

@section('content')
    @can('create products')
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Products</h2>
            <a href="{{ route('admin.create.product') }}" class="btn btn-primary">+ New Product</a>
        </div>
    @endcan

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>
                        @can('update products')
                            <a href="{{ route('admin.product.update', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        @endcan
                        @can('delete products')
                            <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">No products found.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
