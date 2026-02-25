<?php $__env->startSection('title', 'Admin Dashboard'); ?>
<?php $__env->startSection('selection', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- ================= FIRST ROW (Existing Summary) ================= -->
    <div class="row g-3">

        <div class="col-md-3">
            <a href="<?php echo e(route('admin.show.customers')); ?>" class="card-link">
                <div class="card bg-secondary text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <h2 class="card-text"><?php echo e($total_users); ?></h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?php echo e(route('admin.show.rooms')); ?>" class="card-link">
                <div class="card bg-secondary text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Rooms</h5>
                        <h2 class="card-text"><?php echo e($total_rooms); ?></h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?php echo e(route('dashboard.rooms.available')); ?>" class="card-link">
                <div class="card bg-success text-dark shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Rooms Available</h5>
                        <h2 class="card-text"><?php echo e($total_rooms_available); ?></h2> 
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?php echo e(route('dashboard.rooms.booked')); ?>" class="card-link">
                <div class="card bg-danger text-white shadow-sm clickable-card">
                    <div class="card-body">
                        <h5 class="card-title">Rooms Booked</h5>
                        <h2 class="card-text"><?php echo e($total_booked); ?></h2> 
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- ================= SECOND ROW (Reporting Section) ================= -->
    <div class="row g-3 mt-4">

       <div class="col-md-3">
             <a href="<?php echo e(route('admin.show.bookings')); ?>" class="card-link text-decoration-none"><div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                   <h5 class="card-title">Total Bookings</h5>
                    <h2><?php echo e($total_bookings); ?></h2>
                </div>
            </div>
               </a> 
        </div>
     

        <div class="col-md-3">
            <a href="<?php echo e(route('dashboard.bookings.today')); ?>" class="card-link text-decoration-none"><div class="card bg-info text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Bookings Today</h5>
                    <h2><?php echo e($todays_booking); ?></h2>
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Monthly Bookings</h5>
                    <h2><?php echo e($monthly_bookings); ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <a href="<?php echo e(route('dashboard.total.revenue')); ?>" class="card-link text-decoration-none"><div class="card bg-dark text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <h2>$<?php echo e(number_format($total_revenue, 2)); ?></h2>
                </div>
            </div>
            </a>
        </div>

    </div>

</div>

<style>
    .clickable-card {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }
    .clickable-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>