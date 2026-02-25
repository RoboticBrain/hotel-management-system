

<?php $__env->startSection('title', 'Total Summary'); ?>
<?php $__env->startSection('selection', 'Total Summary'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
    <h3 class="text-white mb-4">Your Booking Spending</h3>
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead class="text-uppercase text-secondary">
                    <tr>
                        <th>Date</th>
                        <th>Room Type</th>
                        <th>Room No</th>
                        <th>Nights</th>
                        <th>Price/Night</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $checkIn  = $booking->checked_in->startOfDay();
                            $checkOut = $booking->checked_out->startOfDay();
                            $totalDays = $checkIn->diffInDays($checkOut);
                        ?>
                        <tr class="align-middle">
                            <td><?php echo e($booking->checked_in->format('d M')); ?> <i class="bi bi-arrow-right"></i>  <?php echo e($booking->checked_out->format('d M')); ?></td>
                            <td><?php echo e(ucfirst($booking->room->room_type)); ?></td>
                            <td><?php echo e($booking->room->room_number); ?></td>
                            <td><?php echo e($totalDays); ?></td>
                            <td><?php echo e($booking->room->price); ?></td>
                            <td>$<?php echo e($totalDays * (int) str_replace('$','',$booking->room->price )); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </tbody>
                <tfoot>
                    <tr class="fw-bold text-white bg-secondary">
                        <td colspan="5" class="text-end text-info">Total Spent:</td>
                        <td class="text-info">$<?php echo e($totalPay); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>

</div>
<?php $__env->stopSection(); ?>
<style>
/* Dark & authentic table style */
.table-dark {
    background: linear-gradient(145deg, #2b3545, #232b38);
    border-radius: 15px;
    overflow: hidden;
}

.table-dark th {
    border-bottom: 2px solid rgba(255,255,255,0.1);
    letter-spacing: 0.5px;
    font-size: 0.85rem;
}

.table-dark td {
    border-top: 1px solid rgba(255,255,255,0.05);
    font-size: 0.9rem;
}

.table-hover tbody tr:hover {
    background-color: rgba(13,110,253,0.1);
}

tfoot tr {
    font-size: 1rem;
    letter-spacing: 0.5px;
}
</style>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/dashboard/total_spending.blade.php ENDPATH**/ ?>