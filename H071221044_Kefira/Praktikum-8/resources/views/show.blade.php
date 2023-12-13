<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassicModels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #ECE3CE;
    }

    .img {
        width: 150px;
        border-radius: 50px;
        margin-right: 20px;
    }

    nav {
        position: fixed;
        background-color: #739072;
        justify-content: center;
        text-align: center;
        align-items: center;
    }

    ul {
        padding-top: 20px;
        padding-bottom: 20px;
        display: flex;
        gap: 20px;
        text-decoration: none;
    }

    nav li {
        color: black;
        font-size: 25px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        list-style: none;
        box-shadow: inset 0 0 0 0 #4F6F52;
        margin: 0 -.25rem;
        padding: 0 .25rem;
        transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
    }

    nav li:hover {
        border-radius: 10px;
        box-shadow: inset 100px 0 0 0 #4F6F52;
        color: white;
    }

    .search {
        display: inline-block;
        border-radius: 13px;
        background-color: #3A4D39;
        color: black;
        transition: all .50s;
        cursor: pointer;
    }

    .search:hover {
        border: 5px solid #4F6F52;
        background: transparent;
        color: #4F6F52;
    }

    label {
        word-wrap: break-word;
        width: 200px;
    }

    label {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="collapse navbar-collapse ms-4" id="navbarNav">
                <ul class="me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('product') ? 'active' : '' }}" href="/product">Products</a>
                    </li>
                </ul>
                <form class="d-flex align-items-end" action="{{ route('productlines') }}" method="GET">
                    <input class="form-control me-2" type="search" name="productLine"
                        placeholder="Search by Product Line" aria-label="Search">
                    <button class="btn search" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container">

        <h2 class="mt-4">Informasi Produk</h2>
                <table>
                    <form>
                        <tr>
                            <h3><label></label></h3>
                            <h3><span>{{ $product->productName }}</span></h3>
                        </tr>
                        <tr>
                            <td><label>Jenis Produk</label></td>
                            <td><span>: {{ $product->productLine }}</span></td>
                        </tr>
                        <tr>
                            <td><label>Skala Produk</label></td>
                            <td><span>: {{ $product->productScale }}</span></td>
                        </tr>
                        <tr>
                            <td><label>Product Vendor</label></td>
                            <td><span>: {{ $product->productVendor }}</span></td>
                        </tr>
                        <tr>
                            <td><label>Deskripsi</label></td>
                            <td><span>: {{ $product->productDescription }}</span></td>
                        </tr>
                        <tr>
                            <td><label>Stock</label></td>
                            <td><span>: {{ $product->quantityInStock }}</span></td>
                        </tr>
                        <tr>
                            <td><label>Harga Beli</label></td>
                            <td><span>: {{ $product->buyPrice }}</span></td>
                        </tr>
                        <tr>
                            <td><label>Harga Jual</label></td>
                            <td><span>: {{ $product->MSRP }}</span></td>
                        </tr>
                    </form>
                </table>
                <button class="btn search mt-4 mb-4"><a href="/product" style="text-decoration: none; color: black;">Back to products</a>
                </button>

        </div>
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>
    
    </html>
    
