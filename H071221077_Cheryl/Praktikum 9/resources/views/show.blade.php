<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


    <div class="container">
        <h1>Detail Produk Sepatu</h1>
        
        <table class="table table-bordered">
            <tr>
                <th style="border: 1px solid #ddd;">Brand</th>
                <td style="border: 1px solid #ddd;">{{ $shoesProduct->brand }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Size</th>
                <td style="border: 1px solid #ddd;">{{ $shoesProduct->size }}</td>
            </tr>
        
            <tr>
                <th style="border: 1px solid #ddd;">Harga</th>
                <td style="border: 1px solid #ddd;">{{ $shoesProduct->price }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Stok</th>
                <td style="border: 1px solid #ddd;">{{ $shoesProduct->stock }}</td>
            </tr>
        </table>

        <a href="{{ route('shoes-products.index') }}" class="btn btn-primary" style="background-color: rgb(55, 109, 175); border-color:rgb(55, 109, 175);">Kembali ke Daftar Produk</a>
    </div>

