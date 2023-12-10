<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product | classicmodels</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .product {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 20px;
        }

        .title {
            color: #007bff;
        }

        .table {
            margin-top: 20px;
            border: 2px solid black;
        }

        th, td {
            text-align: center;
            border: 2px solid black;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="product">
        <div class="container text-center">
            <h1 class="title">Product Details</h1>

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
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->productCode); ?></td>
                            <td><?php echo e($product->productName); ?></td>
                            <td><?php echo e($product->productLine); ?></td>
                            <td><?php echo e($product->productScale); ?></td>
                            <td><?php echo e($product->productVendor); ?></td>
                            <td><?php echo e($product->productDescription); ?></td>
                            <td><?php echo e($product->quantityInStock); ?></td>
                            <td><?php echo e($product->buyPrice); ?></td>
                            <td><?php echo e($product->MSRP); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php /**PATH D:\xammp\htdocs\Tugas-8\resources\views/details.blade.php ENDPATH**/ ?>