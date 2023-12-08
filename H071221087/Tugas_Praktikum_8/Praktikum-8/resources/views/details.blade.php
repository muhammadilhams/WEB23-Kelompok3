@extends('layouts.main')

@section('title')
    Product Details
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .product {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 20px;
        }

        .title {
            color: black;
        }

        .table {
            margin-top: 20px;
            border: 1px solid black;
        }

        .table thead {
            vertical-align: middle;
        }

        th, td {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="product">
        <div class="container text-center">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Line</th>
                        <th scope="col">Product Scale</th>
                        <th scope="col">Product Vendor</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Quantity in Stock</th>
                        <th scope="col">Buy Price</th>
                        <th scope="col">MSRP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->productCode }}</td>
                            <td>{{ $product->productName }}</td>
                            <td>{{ $product->productLine }}</td>
                            <td>{{ $product->productScale }}</td>
                            <td>{{ $product->productVendor }}</td>
                            <td>{{ $product->productDescription }}</td>
                            <td>{{ $product->quantityInStock }}</td>
                            <td>{{ $product->buyPrice }}</td>
                            <td>{{ $product->MSRP }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection

</body>
</html>
