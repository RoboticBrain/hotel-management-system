

<?php $__env->startSection('title', 'My Bookings'); ?>
<?php $__env->startSection('selection', 'My Bookings'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <?php if($user_bookings->count() < 1): ?>
        <h3 class="text-white mb-4 badge bg-danger fs-4 rounded">No Bookings so far</h3>
    <?php else: ?>
        <h3 class="mb-4 text-white">My Bookings</h3>

        <div class="row g-4">
            <?php $__currentLoopData = $user_bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="booking-card">

                        <!-- Room Image -->
                        <img src="<?php echo e(asset('storage/' . $booking->room->image)); ?>" 
                             class="w-100 booking-img" 
                             alt="Room Image">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 fw-bold"><?php echo e(ucfirst($booking->room->room_type)); ?> Bed Room</h5>
                                <?php
                                    switch($booking->customer_status){
                                        case 'Cancelled':
                                            $type = 'danger';
                                            break;
                                        case 'Checked_out':
                                            $type = 'secondary';
                                            break;
                                        case 'Checked_in':
                                            $type = 'primary';
                                            break;
                                        default:
                                            $type = 'info';
                                            break;
                                    }
                                ?>
                               <span class="status-badge bg-<?php echo e($type); ?> "> <?php echo e(strtoupper($booking->customer_status)); ?> </span>
                            </div>

                            <?php
                                $checkIn  = $booking->checked_in->startOfDay();
                                $checkOut = $booking->checked_out->startOfDay();
                                $totalDays = $checkIn->diffInDays($checkOut) + 1;
                            
                            ?>
                            <div class="d-flex justify-content-between align-items-end">
                                <ul class="list-unstyled mt-3 booking-info">
                                <?php if($booking->customer_status == 'Checked_out'): ?>
                                    <li><strong>Checked in:</strong> <?php echo e($booking->checked_in->format('d M Y')); ?></li>
                                    <li><strong>Checked out:</strong> <?php echo e($booking->checked_out->format('d M Y')); ?></li>
                                    <li><strong>Total stays:</strong> <?php echo e($totalDays ?? 2); ?></li>
                            
                                <?php elseif($booking->customer_status == 'Checked_in'): ?>
                                    <li><strong>Room No:</strong> <?php echo e($booking->room->room_number); ?></li>
                                    <li><strong>Checked in :</strong> <?php echo e(Carbon\Carbon::parse($booking->checked_in)->format('d M Y  h:i A')); ?></li>
                                    <li><strong>Check out :</strong> <?php echo e(Carbon\Carbon::parse($booking->checked_out)->format('d M Y  h:i A')); ?></li>
                                <?php elseif($booking->customer_status == 'Cancelled'): ?>
                                    <li><strong>Room No:</strong> <?php echo e($booking->room->room_number); ?></li>
                                    <li><strong>Cancelled on:</strong> <?php echo e(Carbon\Carbon::parse($booking->cancelled_at)->format('d M Y h:i A')); ?></li>

                                <?php endif; ?>
                                </ul>
                                <div class="price-box ms-3">
                                    <div class="text-end">
                                        <div class="small text-secondary">Per Night</div>
                                        <div class="fw-semibold fs-6 text-light"><?php echo e($booking->room->price); ?></div>
                                    </div>

                                    <div class="price-divider my-2"></div>
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
}

.status-badge {
    padding: 6px 14px;
    font-size: 12px;
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 1px;
}

.status-active {
    background: linear-gradient(45deg, #0d6efd, #0b5ed7);
    color: #000;
}

.status-completed {
    background-color: #198754;
    color: #000;
}

.status-cancelled {
    background-color: #DC3545;
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/dashboard/bookings/index.blade.php ENDPATH**/ ?>