<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1>Daftar Produk Sepatu</h1>
    <a href="{{ route('shoes-products.create') }}" class="btn btn-primary" style="background-color: rgb(55, 109, 175); border-color: ;">Tambah Produk Baru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Size</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shoesProducts as $product)
                <tr>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('shoes-products.show', $product->id) }}" class="btn btn-primary" style="background-color: rgb(55, 109, 175); border-color:rgb(55, 109, 175);">Detail</a>
                        <a href="{{ route('shoes-products.edit', $product->id) }}" class="btn btn-primary" style="background-color: rgb(55, 109, 175); border-color: rgb(55, 109, 175);">Edit</a>
                        <form action="{{ route('shoes-products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="background-color: red;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
