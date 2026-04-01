

<?php $__env->startSection('title', 'payments'); ?>
<?php $__env->startSection('selection', 'Payments'); ?>
<?php $__env->startSection('filter-form'); ?>
    <?php if (isset($component)) { $__componentOriginal934f921620666b609fa7806109faa21b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal934f921620666b609fa7806109faa21b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-form','data' => ['route' => route('admin.filter.payments'),'statuses' => ['Paid','Unpaid'],'roomTypes' => ['Single','Double','Deluxe'],'priceFilter' => true,'placeholder' => 'Search Payments...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.filter.payments')),'statuses' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Paid','Unpaid']),'roomTypes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Single','Double','Deluxe']),'priceFilter' => true,'placeholder' => 'Search Payments...']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal934f921620666b609fa7806109faa21b)): ?>
<?php $attributes = $__attributesOriginal934f921620666b609fa7806109faa21b; ?>
<?php unset($__attributesOriginal934f921620666b609fa7806109faa21b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal934f921620666b609fa7806109faa21b)): ?>
<?php $component = $__componentOriginal934f921620666b609fa7806109faa21b; ?>
<?php unset($__componentOriginal934f921620666b609fa7806109faa21b); ?>
<?php endif; ?>    
<?php $__env->stopSection(); ?>
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
        <h3 class="text-white">payments</h3>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card w-100 shadow-sm">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <?php if($payments->count() < 1): ?>
                                    <th colspan="10" class="text-start text-danger">
                                        No Payment history found
                                    </th>
                                <?php else: ?>
                                    <th style="width:20%">Transaction ID</th>
                                    <th style="width:16">Customer name</th>
                                    <th style="width:16%">Room Type</th>
                                    <th style="width:16%">Amount</th>
                                    <th style="width:16%">Currency</th>
                                    <th style="width:16%">Status</th>
                                <?php endif; ?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($payment->payment_intent_id); ?></td>
                                <td><?php echo e($payment->booking->customer->first_name); ?> <?php echo e($payment->booking->customer->last_name); ?></td>
                                <td><?php echo e(ucfirst($payment->booking->room->room_type)); ?> (<?php echo e($payment->booking->room->room_number); ?>)</td>
                                <td><?php echo e($payment->amount); ?></td>
                                <td><?php echo e($payment->currency); ?></td>
                                <td><span class="badge bg-<?php echo e($payment->status == 'Paid' ? 'success' : 'danger'); ?>"><?php echo e($payment->status); ?></span></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/payments/index.blade.php ENDPATH**/ ?>