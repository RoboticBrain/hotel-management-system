
<?php $__env->startSection('title','Booked Rooms'); ?>
<?php $__env->startSection('selection','Rooms'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid py-4">
    <?php if($booked_rooms->count() < 1): ?>
        <h3 class="text-white mb-4 badge bg-danger fs-4 rounded">No Rooms are booked so far</h3>
    <?php else: ?>
        <h3 class="text-white mb-4">Booked Rooms</h3>
        <div class="row g-4">
            <?php $__currentLoopData = $booked_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-lg-3">
                    <div class="card room-card border-0 h-100 position-relative">

                        <!-- Status badge -->
                        <span class="badge bg-danger position-absolute top-0 start-0 m-2" style="z-index: 10;">
                            <?php echo e($room->status); ?>

                        </span>

                        <!-- Image -->
                        <div class="room-img position-relative">
                            <img src="<?php echo e(asset('storage/'.$room->image)); ?>"
                                alt="Room image"
                                class="w-100 h-100 object-fit-cover">

                        <span class="price-badge position-absolute bottom-0 end-0 m-2">
                            <?php echo e($room->price); ?> <small class="text-light">/ night</small>
                        </span>

                        </div>

                        <!-- Content -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">
                                <?php echo e($room->room_type); ?> Bed Room
                            </h5>

                            <p class="text-muted small mb-3">
                                Room No: <?php echo e($room->room_number); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/admin/dashboard/booked_rooms.blade.php ENDPATH**/ ?>