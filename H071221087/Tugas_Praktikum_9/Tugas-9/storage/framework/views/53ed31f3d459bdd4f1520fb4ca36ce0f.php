<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $__env->startSection('title'); ?>
        Homepage
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
            <h1 class="title mt-3 text-center">Dota Hero Lists</h1>
            <a href="/addhero" class="btn btn-success">Add Hero</a>
            <table class="table table-bordered mt-4 text-center" style="margin-bottom: 75px ">
                <thead>
                    <tr>
                        <th scope="col">Hero</th>
                        <th scope="col">Role</th>
                        <th scope="col">Type</th>
                        <th scope="col">Difficulty</th>
                        <th scope="col">CRUD BUTTON</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $heroes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($row->hero); ?></td>
                            <td><?php echo e($row->role); ?></td>
                            <td><?php echo e($row->type); ?></td>
                            <td><?php echo e($row->difficulty); ?></td>
                            <td>
                                <a href="/viewhero/<?php echo e($row->id); ?>" class="btn btn-warning">View</a>
                                <a href="/edithero/<?php echo e($row->id); ?>" class="btn btn-primary">Edit</a>
                                <a href="/delete/<?php echo e($row->id); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
</body>

</html>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xammp\htdocs\Tugas-9\resources\views/index.blade.php ENDPATH**/ ?>