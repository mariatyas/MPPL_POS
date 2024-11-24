@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>
            Categories</h4>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id_category }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id_category) }}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id_category) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
