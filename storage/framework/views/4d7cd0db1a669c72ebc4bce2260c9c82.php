<?php $__env->startSection('title', 'Admin dashboard'); ?>
<?php $__env->startSection('selection', 'Customers'); ?>
<?php $__env->startSection('filter-form'); ?>
    <?php if (isset($component)) { $__componentOriginal934f921620666b609fa7806109faa21b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal934f921620666b609fa7806109faa21b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-form','data' => ['route' => route('admin.filter.customers'),'placeholder' => 'Search by name, email or contact...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.filter.customers')),'placeholder' => 'Search by name, email or contact...']); ?> <?php echo $__env->renderComponent(); ?>
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
                                <?php if($customers->count() < 1): ?>
                                    <th colspan="10" class="text-start text-danger">
                                        No customers found.
                                    </th>
                                <?php else: ?>
                                <th style="width:5%">#</th>
                                <th style="width:11%">User Name</th>
                                <th style="width:5%">Role</th>
                                <th style="width:15%">Email</th>
                                <th style="width:13%">Address</th>
                                <th style="width:10%">Contact</th>
                                <th style="width:10%">Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>

                                    <td>
                                       
                                        <?php if($customer->user->isAdmin && Auth()->id() == $customer->id): ?>
                                            <?php echo e($customer->first_name); ?>

                                            <span class="badge bg-success ms-1">You</span>
                                   
                                        <?php else: ?>
                                              <?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?>

                                
     <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php echo e($customer->user->isAdmin ? 'Admin' : 'User'); ?>

                                    </td>

                                    <td>
                                        <?php echo e($customer->user->email); ?>

                                    </td>

                                    <td>
                                        <?php echo e($customer->address); ?>

                                    </td>

                                    <td>
                                        <?php echo e($customer->phone_number); ?>

                                    </td>

                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?php echo e(route('profile.show', $customer->id)); ?>"
                                               class="btn btn-sm btn-primary">
                                                View
                                            </a>

                                            <a href="<?php echo e(route('admin.edit.customer',$customer->id)); ?>"
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            <form action="<?php echo e(route('admin.destroy.customer', $customer->id)); ?>"
                                                  method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">
                                                    Delete
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/customers/index.blade.php ENDPATH**/ ?>