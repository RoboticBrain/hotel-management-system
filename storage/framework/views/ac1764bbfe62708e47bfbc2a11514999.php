

<?php $__env->startSection('title', 'Total Summary'); ?>
<?php $__env->startSection('selection', 'Total Summary'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
    <h3 class="text-white mb-4">Total Spending</h3>
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead class="text-uppercase text-secondary">
                    <tr>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Room Type</th>
                        <th>Room No</th>
                        <th>Total Stays</th>
                        <th>Per Night</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $totalPay = 0;
                  ?>
                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $checkIn  = $booking->checked_in->startOfDay();
                            $checkOut = $booking->checked_out->startOfDay();
                            $totalDays = $checkIn->diffInDays($checkOut);
                            $totalPay += $totalDays * (int) str_replace('$','',$booking->room->price );
                        ?>
                        <tr class="align-middle">
                            <td><?php echo e($booking->checked_in->format('d M')); ?> <i class="bi bi-arrow-right"></i>  <?php echo e($booking->checked_out->format('d M')); ?></td>
                            <td><?php echo e($booking->customer->first_name); ?> <?php echo e($booking->customer->last_name); ?></td>
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
                        <td colspan="5" class="text-end text-info">Total Paid:</td>
                        <td class="text-info">$<?php echo e($totalPay); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>


<hr class="my-5 text-secondary">

<h3 class="text-white mb-4">Revenue By Day</h3>

<div class="table-responsive mb-5">
    <table class="table table-dark table-hover align-middle">
        <thead class="text-uppercase text-secondary">
            <tr>
                <th>Date</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $revenueByDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $checkIn  = $day->checked_in->startOfDay();
                $checkOut = $day->checked_out->startOfDay();
                $totalDays = $checkIn->diffInDays($checkOut);
                $totalPay += $totalDays * (int) str_replace('$','',$booking->room->price );
            ?>
                <tr>
                    <td><?php echo e(\Carbon\Carbon::parse($day['checked_in'])->format('d M Y')); ?></td>
                    <td class="text-success fw-bold"><?php echo e($day->room->price); ?></d>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<h3 class="text-white mb-4">Revenue By Month</h3>

<?php
    $revenueByMonth = [
        ['month' => 'January 2026', 'total' => 850],
        ['month' => 'February 2026', 'total' => 420],
        ['month' => 'March 2026', 'total' => 670],
    ];
?>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
        <thead class="text-uppercase text-secondary">
            <tr>
                <th>Month</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $revenueByMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($month['month']); ?></td>
                    <td class="text-warning fw-bold">$<?php echo e($month['total']); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</div>
<?php $__env->stopSection(); ?>
<style> 

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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/reports/total_revenue.blade.php ENDPATH**/ ?>