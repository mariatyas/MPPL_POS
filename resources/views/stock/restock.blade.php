<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .form-group .back-link {
            text-align: center;
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }

        .form-group .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Restock Product</h2>
        <form action="{{ route('products.restocks.update', $product->id_product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="stock_add" class="form-label">Add Stock</label>
                <input type="number" class="form-control" id="stock_add" name="stock_add" required min="1" />
            </div>
            <hr class="my-5" />
            <button type="submit" class="btn btn-primary">Restock</button>
            <button type="submit" class="btn btn-primary"><a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a></button>
        </form>
    </div>

</body>
</html>
