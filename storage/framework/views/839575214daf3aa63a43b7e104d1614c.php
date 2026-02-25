

<?php $__env->startSection('title', 'Admin Dashboard'); ?>
<?php $__env->startSection('selection', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-white">Welcome, <?php echo e(auth()->user()->customer->first_name); ?></h2>        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/home.blade.php ENDPATH**/ ?>