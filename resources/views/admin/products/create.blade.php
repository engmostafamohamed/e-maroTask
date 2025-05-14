@extends('layouts.app')

@section('content')
    <h2>Create Product</h2>

    <form method="POST" action="{{ route('admin.product.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input id="price" type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.products') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
