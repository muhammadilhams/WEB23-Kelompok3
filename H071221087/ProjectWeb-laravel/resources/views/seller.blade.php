<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Penjualan Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            margin-top: 50px;
        }

        h2 {
            color: #000000;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .table {
            margin-top: 20px;
        }

        th, td {
            text-align: center;
        }

        th {
            background-color: #fed8b5;
            color: #000000;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn-warning, .btn-primary, .btn-danger {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <h2>Seller - Penjualan Buku</h2>
        <a href="/create" class="btn btn-success">Add Book</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>CRUD BUTTON</th>
                </tr>
            </thead>
            <tbody>
                <!-- Gantilah bagian ini dengan data buku yang sesuai -->
                @foreach ($bookNovel as $buku )
                <tr>
                    <td>{{ $buku->id }}</td>
                    <td><img src="/Novel/{{$buku->image}}" alt="Gambar Buku 1" style="max-width: 100px;"></td>
                    <td>{{ $buku->name }}</td>
                    <td>{{ $buku->description }}</td>
                    <td>{{ $buku->price }}</td>
                    <td>{{ $buku->stok }}</td>
                    <td>
                        {{-- <a href="/viewchar/{{$buku->id}}" class="btn btn-warning">View</a> --}}
                        <a href="/editchar/{{$buku->id}}" class="btn btn-primary mb-2">Edit</a>
                        <a href="/deletechar/{{$buku->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                <!-- Sampai sini -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Jquery required) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
