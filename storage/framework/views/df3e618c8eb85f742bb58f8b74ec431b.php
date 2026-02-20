

<?php $__env->startSection('title', 'Completed Bookings'); ?>
<?php $__env->startSection('selection', 'Completed Bookings'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <?php if($completed_bookings->count() < 1): ?>
        <h3 class="text-white mb-4 badge bg-danger fs-4 rounded">No Bookings are completed so far</h3>
    <?php else: ?>
        <h3 class="mb-4 text-white">Completed Bookings</h3>

        <div class="row g-4">
            <?php $__currentLoopData = $completed_bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-lg rounded-4 booking-card"
                         style="transition: transform 0.3s, box-shadow 0.3s;">

                        <!-- Room Image -->
                        <img src="<?php echo e(asset('storage/' . $booking->room->image)); ?>" 
                             class="w-100 booking-img" 
                             alt="Room Image">

                        <div class="card-body p-4">

                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 fw-bold"><?php echo e(ucfirst($booking->room->room_type)); ?> Bed Room</h5>
                                <span class="status-badge status-completed">COMPLETED</span>
                            </div>

                            <!-- Stay Info -->
                            <?php
                                $checkIn  = $booking->checked_in->startOfDay();
                                $checkOut = $booking->checked_out->startOfDay();
                                $totalDays = $checkIn->diffInDays($checkOut) + 1;
                            ?>

                            <ul class="list-unstyled mt-3 booking-info">
                                <li><strong>Checked in:</strong> <?php echo e($booking->checked_in->format('d M Y')); ?></li>
                                <li><strong>Checked out:</strong> <?php echo e($booking->checked_out->format('d M Y')); ?></li>
                                <li><strong>Total Stays:</strong> <?php echo e($totalDays); ?></li>
                            </ul>
                            
                            <div class="text-end mt-3">
                                <div class="small text-secondary">Total</div>
                                <div class="fw-bold fs-5 text-success d-flex gap-2 align-items-center">
                                    $<?php echo e((int)$totalDays * (int)str_replace('$','',$booking->room->price)); ?>

                                    <span class="badge bg-success text-white p-2">Paid</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<style>
body {
    background-color: #1f2937;
}

.booking-card {
    background: linear-gradient(145deg, #2b3545, #232b38);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    color: #fff;
}
.booking-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.5);
}

.booking-img {
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.status-badge {
    padding: 6px 14px;
    font-size: 12px;
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 1px;
}

.status-completed {
    background-color: #198754; /* Bootstrap green */
    color: #fff;
}

.booking-info li {
    margin-bottom: 6px;
    font-size: 14px;
    color: #cbd5e1;
}
</style>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/dashboard/completed_bookings.blade.php ENDPATH**/ ?>