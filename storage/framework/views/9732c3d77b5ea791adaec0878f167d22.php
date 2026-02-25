

<?php $__env->startSection('title', 'Cancelled Bookings'); ?>
<?php $__env->startSection('selection', 'Cancelled Bookings'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-5">
     <?php if($cancelled_bookings->count() < 1): ?>
            <ul class="list-unstyled text-secondary">
                <li class="mb-2 text-danger"><i class="bi bi-x-circle-fill me-2 text-danger"></i>No Cancelled bookings found for your account.</li>
            <?php else: ?>
               
                <div class="row g-4">
                    <?php $__currentLoopData = $cancelled_bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-lg rounded-4 booking-card"
                            style="transition: transform 0.3s, box-shadow 0.3s;">

                            <img src="<?php echo e(asset('storage/' . $booking->room->image)); ?>" 
                                class="w-100 booking-img" 
                                alt="Room Image">

                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="mb-0 fw-bold"><?php echo e(ucfirst($booking->room->room_type)); ?> Bed Room</h5>
                                    <span class="status-badge status-cancelled">CANCELLED</span>
                                </div>
                                <?php
                                    $checkIn  = $booking->checked_in->startOfDay();
                                    $checkOut = $booking->checked_out->startOfDay();
                                    $totalDays = $checkIn->diffInDays($checkOut) + 1;
                                ?>
                                <div class="d-flex justify-content-between align-items-end">
                                    <ul class="list-unstyled mt-3 booking-info">
                                    <li><strong>Room No:</strong> <?php echo e($booking->room->room_number); ?></li>
                            
                                    <li><strong>Cancelled on:</strong> <?php echo e(Carbon\Carbon::parse($booking->cancelled_at)->format('d M Y h:i A')); ?></li>
                                </ul>
                                <!-- Price Section -->
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

.status-cancelled {
    background-color: #DC3545; /* Bootstrap red */
    color: #fff;
}

.booking-info li {
    margin-bottom: 6px;
    font-size: 14px;
    color: #cbd5e1;
}

.price-divider {
    border-top: 1px dashed rgba(255,255,255,0.2);
    margin: 5px 0;
}
</style>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/dashboard/cancelled_bookings.blade.php ENDPATH**/ ?>