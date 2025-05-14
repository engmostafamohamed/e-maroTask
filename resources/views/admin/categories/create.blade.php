@extends('layouts.app')

@section('content')
    <h2>Create Category</h2>

    <form method="POST" action="{{ route('admin.category.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
