

<?php $__env->startSection('title', 'Admin dashboard'); ?>
<?php $__env->startSection('selection', 'Customers'); ?>
<?php $__env->startSection('content'); ?>

<style>
    /* ===== HARD STOP HORIZONTAL SCROLL ===== */
    html, body {
        max-width: 100vw;
        overflow-x: hidden !important;
    }

    /* Lock table layout */
    .fixed-table {
        table-layout: fixed !important;
        width: 100% !important;
        max-width: 100% !important;
    }

    /* Force cells to stay inside */
    .fixed-table th,
    .fixed-table td {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Button column safety */
    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
        max-width: 100%;
    }

    .action-buttons form {
        margin: 0;
    }
</style>

<div class="container-fluid px-2">
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <!-- DO NOT use table-responsive -->
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <?php if($todaysBooking->count() < 1): ?>
                                    <th colspan="10" class="text-start text-danger">
                                        No bookings found for today.
                                    </th>
                                <?php else: ?>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Room Booked</th>
                                <th>Room Number</th>
                                 <th>Status</th>
                                <th>Booking Date</th>
                               
                                
                                <?php endif; ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $todaysBooking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>

                                    <td>
                                        <?php echo e($booking->customer->first_name); ?> <?php echo e($booking->customer->last_name); ?>

                                    </td>

                                    <td>
                                        <?php echo e(ucfirst($booking->room->room_type)); ?> Bed Room
                                    </td>

                                    <td>
                                        <?php echo e($booking->room->room_number); ?>

                                    </td>
                                    <td>
                                        <?php echo e(strtoupper($booking->customer_status)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($booking->checked_in->format('d M Y')); ?> - <?php echo e($booking->checked_out->format('d M Y')); ?>

                                    </td>
                                   
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/reports/today_booking.blade.php ENDPATH**/ ?>