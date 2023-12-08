<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


    <div class="container">
        <h1>Edit Produk Sepatu</h1>
        <form action="{{ route('shoes-products.update', $shoesProduct->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $shoesProduct->brand }}" required>
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ $shoesProduct->size }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $shoesProduct->price }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stok:</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $shoesProduct->stock }}" required>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: rgb(55, 109, 175); border-color: rgb(55, 109, 175) ">Perbarui</button>
        </form>
    </div>

