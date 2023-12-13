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
    <div class="product" >
        <div class="container text-center">
            <h1 class="title">Product Lists</h1>

            <table class="table table-bordered mt-4 text-center" style="margin-bottom: 75px ">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Line</th>
                        <th scope="col">Product Vendor</th>
                        <th scope="col">Quantity in Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a href="<?php echo e(route('product.details', ['productCode' => $product->productCode])); ?>"><?php echo e($product->productName); ?></a></td>
                            <td><?php echo e($product->productLine); ?></td>
                            <td><?php echo e($product->productVendor); ?></td>
                            <td><?php echo e($product->quantityInStock); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

</body>
</html>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Praktikum-8\resources\views/productlines.blade.php ENDPATH**/ ?>