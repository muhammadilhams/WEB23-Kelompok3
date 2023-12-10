<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $__env->startSection('title'); ?>
        Tabel Products
    <?php $__env->stopSection(); ?>
    <link rel="stylesheet" href="css/style.css">
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tugas-8\resources\views/product.blade.php ENDPATH**/ ?>