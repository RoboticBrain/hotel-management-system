
<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('selection','Home'); ?>
<?php $__env->startSection('content'); ?>
<div class="card shadow-sm border-0 bg-transparent mb-4">
    <div class="card-body p-0">
        <form method="GET">
            <div class="row g-3">

                <!-- Search -->
                <div class="col-md-4">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search bookings..."
                           value="<?php echo e(request('search')); ?>">
                </div>

                <!-- Status -->
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <!-- Date Range -->
                <div class="col-md-2">
                    <input type="date" name="from" class="form-control"
                           value="<?php echo e(request('from')); ?>">
                </div>

                <div class="col-md-2">
                    <input type="date" name="to" class="form-control"
                           value="<?php echo e(request('to')); ?>">
                </div>

                <!-- Button -->
                <div class="col-md-1">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views\user\dashboard\home.blade.php ENDPATH**/ ?>