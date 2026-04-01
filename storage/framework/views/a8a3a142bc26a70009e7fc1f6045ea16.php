

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

            <?php
                switch($booking->customer_status){
                    case 'Cancelled':
                        $statusColor = 'danger';
                        break;
                    case 'Checked_out':
                        $statusColor = 'secondary';
                        break;
                    case 'Checked_in':
                        $statusColor = 'primary';
                        break;
                    default:
                        $statusColor = 'info';
                        break;
                }

                $paymentStatus = $booking->payment_status ?? 'pending';

                switch($paymentStatus){
                    case 'paid':
                        $paymentColor = 'success';
                        break;
                    case 'failed':
                        $paymentColor = 'danger';
                        break;
                    default:
                        $paymentColor = 'warning';
                        break;
                }

                $checkIn  = \Carbon\Carbon::parse($booking->checked_in)->startOfDay();
                $checkOut = \Carbon\Carbon::parse($booking->checked_out)->startOfDay();
                $totalDays = $checkIn->diffInDays($checkOut);
            ?>

            <div class="col-md-6 col-lg-4">

                <div class="booking-card">

                    <!-- Room Image -->
                    <img src="<?php echo e(asset('storage/' . $booking->room->image)); ?>"
                         class="w-100 booking-img"
                         alt="Room Image">

                    <div class="p-4">

                        <!-- Room Title + Status -->
                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <h5 class="mb-0 fw-bold">
                                <?php echo e(ucfirst($booking->room->room_type)); ?> Bed Room
                            </h5>

                           <span class="status-badge bg-<?php echo e($statusColor); ?>">
                            <?php echo e(($booking->payment_status == 'paid' && $booking->customer_status != 'Cancelled') 
                                ? strtoupper($booking->customer_status) 
                                : ($booking->payment_status == 'pending' ? 'CONFIRMED' : 'CANCELLED')); ?>

                            </span>
                        </div>


                        <!-- Booking Info -->
                        <div class="d-flex justify-content-between align-items-end">

                            <ul class="list-unstyled mt-3 booking-info">

                                <?php if($booking->customer_status == 'Checked_out' || $booking->customer_status == 'Confirmed'): ?>

                                    <li>
                                        <strong>Checked in:</strong>
                                        <?php echo e(\Carbon\Carbon::parse($booking->checked_in)->format('d M Y')); ?>

                                    </li>

                                    <li>
                                        <strong>Checked out:</strong>
                                        <?php echo e(\Carbon\Carbon::parse($booking->checked_out)->format('d M Y')); ?>

                                    </li>

                                    <li>
                                        <strong>Total stays:</strong>
                                        <?php echo e($totalDays); ?> days
                                    </li>

                                <?php elseif($booking->customer_status == 'Checked_in'): ?>

                                    <li>
                                        <strong>Room No:</strong>
                                        <?php echo e($booking->room->room_number); ?>

                                    </li>

                                    <li>
                                        <strong>Checked in:</strong>
                                        <?php echo e(\Carbon\Carbon::parse($booking->checked_in)->format('d M Y')); ?>

                                    </li>

                                    <li>
                                        <strong>Check out:</strong>
                                        <?php echo e(\Carbon\Carbon::parse($booking->checked_out)->format('d M Y')); ?>

                                    </li>

                                <?php elseif($booking->customer_status == 'Cancelled'): ?>

                                    <li>
                                        <strong>Room No:</strong>
                                        <?php echo e($booking->room->room_number); ?>

                                    </li>

                                    <li>
                                        <strong>Cancelled on:</strong>
                                        <?php echo e(\Carbon\Carbon::parse($booking->cancelled_at)->format('d M Y h:i A')); ?>

                                    </li>

                                <?php endif; ?>

                            </ul>


                            <!-- Price -->
                            <div class="price-box ms-3">

                                <div class="text-end">
                                    <div class="small text-secondary">Per Night</div>
                                    <div class="fw-semibold fs-6 text-light">
                                        <?php echo e($booking->room->price); ?>

                                    </div>
                                </div>

                                <div class="price-divider my-2"></div>

                            </div>

                        </div>


                        <!-- Payment Section -->
                        <div class="d-flex justify-content-between align-items-center mt-3">

                            <span class="badge bg-<?php echo e($paymentColor); ?> payment-badge p-2 text-black">
                                <?php echo e(strtoupper($paymentStatus)); ?>

                            </span>

                            <?php if($paymentStatus == 'pending' && $booking->customer_status != 'Cancelled'): ?>

                                <a href="<?php echo e(route('stripe.checkout', $booking->id)); ?>"
                                   class="btn btn-sm btn-success pay-btn rounded" target="_blank">
                                    Pay Now
                                </a>

                            <?php endif; ?>

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

body{
    background-color:#1f2937;
}

.booking-card{
    background:linear-gradient(145deg,#2b3545,#232b38);
    border:1px solid rgba(255,255,255,0.05);
    border-radius:20px;
    overflow:hidden;
    transition:all 0.3s ease;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    color:#fff;
}

.booking-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 40px rgba(0,0,0,0.5);
}

.booking-img{
    height:180px;
    object-fit:cover;
}

.status-badge{
    padding:6px 14px;
    font-size:12px;
    border-radius:50px;
    font-weight:600;
    letter-spacing:1px;
}

.booking-info li{
    margin-bottom:6px;
    font-size:14px;
    color:#cbd5e1;
}

.price-divider{
    border-top:1px dashed rgba(255,255,255,0.2);
}

.payment-badge{
    padding:6px 14px;
    border-radius:30px;
    font-size:12px;
    letter-spacing:1px;
}

.pay-btn{
    border-radius:30px;
    padding:6px 16px;
    font-size:13px;
    font-weight:600;
    transition:0.3s;
}

.pay-btn:hover{
    transform:scale(1.05);
}

</style>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views\user\dashboard\bookings\index.blade.php ENDPATH**/ ?>