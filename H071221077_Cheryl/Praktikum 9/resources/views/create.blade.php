<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    <div class="container">
        <h1>Tambah Produk Baru</h1>
        <form action="{{ route('shoes-products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" id="size" name="size" required>
            </div>


            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="stock">Stok:</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: rgb(55, 109, 175); border-color: rgb(55, 109, 175);">Simpan</button>
        </form>

        @if(isset($shoesProducts))
            <h1>Daftar Produk Sepatu</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Size</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shoesProducts as $product)
                        <tr>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

