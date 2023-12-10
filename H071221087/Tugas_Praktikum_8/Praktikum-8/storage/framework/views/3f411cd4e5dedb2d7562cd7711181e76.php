

<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
<div class="card w-50 mt-5 mx-auto">
    <div class="card-body">
      <h5 class="card-title">Tabel Products</h5>
      <p class="card-text">Tekan tombol berikut untuk melihat data pada tabel products dari database classicmodels.</p>
      <a href="/product" class="btn btn-primary">Tampilkan</a>
    </div>
<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tugas-8\resources\views/home.blade.php ENDPATH**/ ?>