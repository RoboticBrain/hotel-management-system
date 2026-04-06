

<?php $__env->startSection('title', 'profile'); ?>

<?php
    $adminOruser = $customer->user->isAdmin ? 'admin profile' : 'user profile';
?>

<?php $__env->startSection('selection', 'Edit ' . $adminOruser); ?>

<?php $__env->startSection('content'); ?>
<section>
  <div class="container py-5">
    <form action="<?php echo e(route('profile.update', $customer->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card mb-4 h-100">
                    <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                        class="rounded-circle img-fluid" style="width: 150px;">

                        <p class="text-muted mb-1 mt-3" style="font-weight:bold;">
                        <?php echo e($customer->user->isAdmin ? 'Administrator' : 'User'); ?>

                        </p>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card mb-4 h-100 flex justify-content-center">
            <div class="card-body">

              <!-- Name -->
              <div class="row mb-3">
                <div class="col-sm-3">Full Name</div>
                <div class="col-sm-9 d-flex gap-2">
                  <input type="text" name="first_name" class="form-control"
                         value="<?php echo e($customer->first_name); ?>">
                  <input type="text" name="last_name" class="form-control"
                         value="<?php echo e($customer->last_name); ?>">
                </div>
              </div>

              <!-- Email -->
              <div class="row mb-3">
                <div class="col-sm-3">Email</div>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control"
                         value="<?php echo e($customer->user->email); ?>">
                </div>
              </div>

              <!-- Phone -->
              <div class="row mb-3">
                <div class="col-sm-3">Mobile</div>
                <div class="col-sm-9">
                  <input type="text" name="phone_number" class="form-control"
                         value="<?php echo e($customer->phone_number); ?>">
                </div>
              </div>

              <!-- Address -->
              <div class="row mb-3">
                <div class="col-sm-3">Address</div>
                <div class="col-sm-9">
                  <input type="text" name="address" class="form-control"
                         value="<?php echo e($customer->address); ?>">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- Submit -->
      <div class="text-end mt-3">
        <button type="submit" class="btn btn-primary me-2">
          Update Profile
        </button>
        <a href="<?php echo e(route('profile.change.password',$customer->id)); ?>"><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
          Change Password
        </button> </a>
      </div>

      </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/profile/settings.blade.php ENDPATH**/ ?>