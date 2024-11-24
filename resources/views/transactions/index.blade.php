@extends('layouts.app')

@section('content')
<div class="container">
    <h2>New Transaction</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="products[]">Select Product</label>
            <select name="products[]" class="form-control" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id_product }}">{{ $product->product_name }} - Stock: {{ $product->stock }} - Price: {{ $product->price }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantities[]">Quantities</label>
            <input type="number" name="quantities[]" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="payment_amount">Payment Amount</label>
            <input type="number" name="payment_amount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Process Transaction</button>
    </form>
</div>
@endsection
