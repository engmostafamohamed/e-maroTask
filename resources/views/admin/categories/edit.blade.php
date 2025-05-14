@extends('layouts.app')

@section('content')
    <h2>Edit Category</h2>

    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
