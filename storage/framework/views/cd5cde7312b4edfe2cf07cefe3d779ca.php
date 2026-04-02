<?php $__env->startSection('title', 'User Dashboard'); ?>
<?php $__env->startSection('selection', 'User Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Dashboard Cards -->
    <div class="row g-3">

        <div class="col-md-4">
            <a href="<?php echo e(route('user.show.bookings')); ?>" class="card-link">
                <div class="card bg-warning text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">My Bookings</h5>
                        <h2 class="card-text"><?php echo e($my_bookings); ?></h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?php echo e(route('user.dashboard.active.bookings')); ?>" class="card-link">
                <div class="card bg-primary text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Active Bookings</h5>
                        <h2 class="card-text"><?php echo e($active_bookings); ?></h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?php echo e(route('user.dashboard.completed.bookings')); ?>" class="card-link">
                <div class="card bg-success text-dark shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Completed bookings</h5>
                        <h2 class="card-text"><?php echo e($completed_bookings); ?></h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?php echo e(route('user.dashboard.cancelled.bookings')); ?>" class="card-link">
                <div class="card bg-danger text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Cancelled Bookings</h5>
                        <h2 class="card-text"><?php echo e($cancelled_bookings); ?></h2> 
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo e(route('user.dashboard.payment.summary')); ?>" class="card-link">
                <div class="card bg-info text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Amount Spent</h5>
                        <h2 class="card-text">$<?php echo e($totalAmountSpent); ?></h2> 
                    </div>
                </div>
            </a>
        </div>
        <br>

    </div>
</div>


<style>
    /* Make the whole card clickable and stylish */
    .clickable-card {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }
    .clickable-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    /* Remove default link styles */
    .card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/dashboard/dashboard.blade.php ENDPATH**/ ?>