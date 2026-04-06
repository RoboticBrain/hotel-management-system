

<?php $__env->startSection('title', 'Change Password'); ?>
<?php $__env->startSection('selection','Profile Update'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="row gx-0">
        <div class="col-12 col-lg-6 px-0">
            <h3 class="mb-4">Change Password</h3>

            
            <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('profile.update.password', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>

        <div class="mb-3">
            <label>Current Password</label>
            <input type="password" name="current_password" class="form-control">
        </div>

        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="new_password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update Password
        </button>

    </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/profile/password-edit.blade.php ENDPATH**/ ?>