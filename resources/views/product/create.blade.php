@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Product Add</h4>

        <!-- Hoverable Table rows -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_category" class="form-label">Category</label>
                                <select class="form-select" id="id_category" name="id_category" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a> <!-- Tombol Kembali -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
