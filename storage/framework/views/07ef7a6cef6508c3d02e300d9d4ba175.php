
<?php $__env->startSection('title','Available Rooms'); ?>
<?php $__env->startSection('selection','Book Your Room'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container-fluid py-4">
    <h3 class="text-white mb-4">Available Rooms</h3>

    <div class="row g-4">
        <?php $__currentLoopData = $available_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-lg-3">
                <div class="card room-card border-0 h-100 position-relative">

                    <!-- Status badge -->
                    <span class="badge bg-<?php echo e($room->status == "Available" ? 'success' : 'danger'); ?> position-absolute top-0 start-0 m-2" style="z-index: 10;">
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
                            <?php echo e(ucfirst($room->room_type)); ?> Bed Room
                        </h5>

                        <p class="text-muted small mb-3">
                            Room No: <?php echo e($room->room_number); ?>

                        </p>
                        <?php if($room->status == 'Booked'): ?>
                            <a href="#" class="btn  mt-auto w-100" style="background-color: #6c757d;">
                                Book Now
                            </a>
                        <?php else: ?> 
                            <a href="<?php echo e(route('user.create.room',$room->id)); ?>" class="btn btn-<?php echo e($room->status == 'Booked' ? 'secondary' : 'success'); ?> mt-auto w-100">
                                Book Now
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/dashboard/rooms/index.blade.php ENDPATH**/ ?>