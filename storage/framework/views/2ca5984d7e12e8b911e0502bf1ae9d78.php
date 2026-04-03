

<?php $__env->startSection('title', 'profile'); ?>

<?php
    $adminOruser = $user->user->isAdmin ? 'Admin Profile' : 'User Profile';
?>

<?php $__env->startSection('selection', $adminOruser); ?>

<?php $__env->startSection('content'); ?>
<section style="background-color: #0000;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4" style="min-height: 325px;">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"></h5>
            <p class="text-muted mb-1 text-bold " style="font-size:larger; font-weight:bold;"><?php echo e($user->user->isAdmin ? 'Administrator' : 'User'); ?></p>
            <p class="text-muted mb-4"><?php echo e($user->address); ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4" style="min-height: 325px;">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo e($user->first_name . ' ' . $user->last_name); ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo e($user->user->email); ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">not found</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo e($user->phone_number); ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo e($user->address); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/profile.blade.php ENDPATH**/ ?>