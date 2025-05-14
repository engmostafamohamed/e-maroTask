@extends('layouts.app')

@section('content')
    <h1>Product Details</h1>

    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $product->price }}</td>
        </tr>
        <!-- Add other fields as necessary -->
    </table>

    @can('view products')
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Back to Product List</a>
    @endcan
@endsection
