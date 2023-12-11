@extends('layouts.main')
@section('container')
    @foreach ($products as $product)
        <article class="mb-3">
            <table>
                <form>
                    <tr>
                        <h3><label for="nama"></label></h3>
                        <h3><span><a href="{{ route('show', $product->productName) }}" style="color: #4F6F52">{{ $product->productName }}</a></span></h3>
                    </tr>
                    <tr>
                        <td><label for="nama">Product Line</label></td>
                        <td><span>: {{ $product->productLine }}</span></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Product Vendor</label></td>
                        <td><span>: {{ $product->productVendor }}</span></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Stock</label></td>
                        <td><span>: {{ $product->quantityInStock }}</span></td>
                    </tr>
                </form>
            </table>
        </article>
    @endforeach
@endsection


