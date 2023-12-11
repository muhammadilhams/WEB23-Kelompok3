<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($product[0]->productName); ?> | Product</title>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>

<body>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Line</th>
                    <th scope="col">Product Scale</th>
                    <th scope="col">Product Vendor</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">MSRP</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($produk->productCode); ?></th>
                    <td><?php echo e($produk->productName); ?></td>
                    <td><?php echo e($produk->productLine); ?></td>
                    <td><?php echo e($produk->productScale); ?></td>
                    <td><?php echo e($produk->productVendor); ?></td>
                    <td><?php echo e($produk->productDescription); ?></td>
                    <td><?php echo e($produk->quantityInStock); ?></td>
                    <td><?php echo e($produk->buyPrice); ?></td>
                    <td><?php echo e($produk->MSRP); ?></td>
                </tr>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html><?php /**PATH C:\Users\rendy\Desktop\praktikum 8\resources\views/detail.blade.php ENDPATH**/ ?>