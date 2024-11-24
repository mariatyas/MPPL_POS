@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span>
            Dashboard</h4>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Hoverable Table rows -->
        <div class="">
            <div class="card">
                <h5 class="card-header">Data Product</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th>Actions</th>
                                <th>Restock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id_product) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id_product) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.restocks.show', $product->id_product) }}" class="btn btn-warning">Restock</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
