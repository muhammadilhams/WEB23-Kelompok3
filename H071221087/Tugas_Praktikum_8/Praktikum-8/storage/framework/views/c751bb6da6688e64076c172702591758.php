

<?php $__env->startSection('title'); ?>
    Product Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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

    <?php $__env->stopSection(); ?>

</body>
</html>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tugas-8\resources\views/productlines.blade.php ENDPATH**/ ?>