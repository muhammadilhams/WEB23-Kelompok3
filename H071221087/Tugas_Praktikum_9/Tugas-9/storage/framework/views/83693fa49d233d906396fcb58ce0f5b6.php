<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $__env->startSection('title'); ?>
        Hero Details
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
            <h1 class="title mt-3 text-center">Hero Details</h1>
            <a href="/" class="btn btn-success">Back</a>
            <table class="table table-bordered mt-4 text-center" style="margin-bottom: 75px ">
                <thead>
                    <tr>
                        <th scope="col">Hero</th>
                        <th scope="col">Role</th>
                        <th scope="col">Type</th>
                        <th scope="col">Ability</th>
                        <th scope="col">Description</th>
                        <th scope="col">Difficulty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $heroes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($row->hero); ?></td>
                            <td><?php echo e($row->role); ?></td>
                            <td><?php echo e($row->type); ?></td>
                            <td><?php echo e($row->ability); ?></td>
                            <td><?php echo e($row->description); ?></td>
                            <td><?php echo e($row->difficulty); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
</body>

</html>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xammp\htdocs\Tugas-9\resources\views/viewdetails.blade.php ENDPATH**/ ?>