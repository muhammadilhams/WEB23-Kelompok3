<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $__env->startSection('title'); ?>
        Detail Karakter 
    <?php $__env->stopSection(); ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        th,td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="product" >
        <div class="container">
            <h1 class="title mt-3 text-center">Detail Karakter</h1>
            <a href="/" class="btn btn-success">Back</a>
            <table class="table table-bordered mt-4 text-center" style="margin-bottom: 75px ">
                <thead>
                    <tr>
                        <th scope="col">Karakter</th>
                        <th scope="col">Role</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $karakter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($row->karakter); ?></td>
                            <td><?php echo e($row->role); ?></td>
                            <td><?php echo e($row->tipe); ?></td>
                            <td><?php echo e($row->asal); ?></td>
                            <td><?php echo e($row->deskripsi); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
</body>

</html>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kuliah\SEMESTER 3\Pemrograman Web\Praktikum Web\Tugas Praktikum\Tugas_Praktikum_9\Tugas-9\resources\views/viewdetails.blade.php ENDPATH**/ ?>