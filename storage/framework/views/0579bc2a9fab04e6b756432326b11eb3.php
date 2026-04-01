

<?php $__env->startSection('title', 'Bookings'); ?>
<?php $__env->startSection('selection', 'Bookings'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* ===== HARD STOP HORIZONTAL SCROLL ===== */
 

    .fixed-table {
        table-layout: fixed !important;
        width: 100% !important;
    }

    .fixed-table th,
    .fixed-table td {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
    }
</style>

<div class="container-fluid px-2">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Manage Bookings</h3>
        <a href="<?php echo e(route('admin.create.booking')); ?>" class="btn btn-primary">
            + Add Booking
        </a>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card w-100 shadow-sm">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <?php if($bookings->count() < 1): ?>
                                    <th colspan="10" class="text-start text-danger">
                                        No bookings found.
                                    </th>
                                <?php else: ?>
                                    <th style="width:8%">User ID</th>
                                    <th style="width:10%">Customer</th>
                                    <th style="width:8%">R-Type</th>
                                    <th style="width:8%">R-Number</th>
                                    <th style="width:12%">Check In</th>
                                    <th style="width:12%">Check Out</th>
                                    <th style="width:12%">Status</th>
                                    <th style="width:12%">Payment</th>
                                    <th style="width:18%">Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                                /* ===== STATUS COLOR LOGIC ===== */
                                $status = strtolower($booking->customer_status);

                                if ($status === 'checked_in') {
                                    $statusClass = 'success';
                                } elseif ($status === 'checked_out') {
                                    $statusClass = 'secondary';
                                } elseif ($status === 'confirmed') {
                                    $statusClass = 'primary';
                                } elseif ($status === 'cancelled') {
                                    $statusClass = 'danger';
                                } else {
                                    $statusClass = 'secondary';
                                }

                                $paymentClass = strtolower($booking->payment_status) === 'paid'
                                    ? 'success'
                                    : 'danger';
                            ?>

<tr>                                <td><?php echo e($booking->customer->id + 50); ?></td>
                                    <td><?php echo e($booking->customer->first_name); ?></td>
                                    <td><?php echo e($booking->room->room_type); ?></td>
                                    <td><?php echo e($booking->room->room_number); ?></td>
                                    <td><?php echo e($booking->checked_in->format('d M Y')); ?></td>
                                    <td><?php echo e($booking->checked_out->format('d M Y')); ?></td>
                             
                                <!-- STATUS -->
                                <td>
                                    <span class="badge bg-<?php echo e($statusClass); ?>">
                                        <?php echo e(str_replace('_',' ', ucfirst($booking->customer_status))); ?>

                                    </span>
                                </td>

                                <!-- PAYMENT -->
                                <td>
                                    <span class="badge bg-<?php echo e($paymentClass); ?>">
                                        <?php echo e($booking->payment_status ?? 'Pending'); ?>

                                    </span>
                                </td>

                                <!-- ACTIONS -->
                                <td>
                                    <div class="action-buttons">
                                        <a href="<?php echo e(route('admin.booking.edit', $booking->id)); ?>"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="<?php echo e(route('admin.booking.destroy', $booking->id)); ?>"
                                              method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Cancel this booking?')">
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views\admin\dashboard\bookings\index.blade.php ENDPATH**/ ?>