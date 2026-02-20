<?php $__env->startSection('title', 'Rooms'); ?>
<?php $__env->startSection('selection', 'Rooms'); ?>

<?php $__env->startSection('filter-form'); ?>
    <?php if (isset($component)) { $__componentOriginal934f921620666b609fa7806109faa21b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal934f921620666b609fa7806109faa21b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-form','data' => ['route' => route('admin.filter.rooms'),'placeholder' => 'Room Number...','roomTypes' => ['Single', 'Double', 'Deluxe'],'priceFilter' => true,'statuses' => ['Available', 'Booked']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.filter.rooms')),'placeholder' => 'Room Number...','roomTypes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Single', 'Double', 'Deluxe']),'priceFilter' => true,'statuses' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Available', 'Booked'])]); ?> <?php echo $__env->renderComponent(); ?>
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
<div class="container-fluid">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Manage Rooms</h3>
        <a href="<?php echo e(route('admin.create.room')); ?>">
            <button class="btn btn-primary">+ Add Room</button>
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <?php if($rooms->count() < 1): ?>
                            <th colspan="10" class="text-start text-danger">No rooms found</th>
                        <?php else: ?>
                        <th>#</th>
                        <th>Image</th>
                        <th>Room No</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th style="text-align: center;">Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td style="width:200px;">
                            <img src="<?php echo e(asset('storage/'.$room->image)); ?>" 
                                 class="img-fluid rounded cursor-pointer" 
                                 onclick="openImageModal(this.src)" 
                                 alt="Room Image">
                        </td>
                        <td><?php echo e($room->room_number); ?></td>
                        <td><?php echo e(ucfirst($room->room_type)); ?></td>
                        <td><?php echo e($room->price); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($room->status == 'Available' ? 'success':'danger'); ?>"><?php echo e($room->status); ?></span>
                        </td>
                        <td style="text-align: center;">
                            <a href="<?php echo e(route('admin.edit.room', $room->id)); ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="<?php echo e(route('admin.destroy.room', $room->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-3">
                <?php echo e($rooms->links()); ?>

            </div>
        </div>
    </div>

</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="btn-close btn-close-white ms-auto me-2 mt-2" data-bs-dismiss="modal"></button>
            <img id="modalImage" class="img-fluid rounded shadow" alt="Room Image">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<script>
function openImageModal(src) {
    const modalImg = document.getElementById('modalImage');
    modalImg.src = src;

    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}
</script>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/rooms/index.blade.php ENDPATH**/ ?>