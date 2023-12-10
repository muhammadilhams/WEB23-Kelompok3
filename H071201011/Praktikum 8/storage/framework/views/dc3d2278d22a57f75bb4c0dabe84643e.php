<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?> | Product</title>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>

<body>
    <?php
    $number = 1;
    ?>
    <div class="container">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown link
            </a>

            <ul class="dropdown-menu">
            <?php $__currentLoopData = $productLine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a class="dropdown-item" href="<?php echo e(route('search',['productLine'=>$list->productLine])); ?>"><?php echo e($list->productLine); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Line</th>
                    <th scope="col">Product Vendor</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($number); ?></th>
                    <td><a href="<?php echo e(route('detail',['productCode'=>$produk->productCode])); ?>"><?php echo e($produk->productName); ?></a></td>
                    <td><?php echo e($produk->productLine); ?></td>
                    <td><?php echo e($produk->productVendor); ?></td>
                    <td><?php echo e($produk->quantityInStock); ?></td>
                </tr>
                <?php
                $number++;
                ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html><?php /**PATH C:\Users\rendy\Desktop\praktikum 8\resources\views/index.blade.php ENDPATH**/ ?>