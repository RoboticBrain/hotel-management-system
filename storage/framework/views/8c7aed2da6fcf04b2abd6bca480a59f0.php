

<?php $__env->startSection('title', 'Secure Checkout'); ?>
<?php $__env->startSection('selection', 'Secure Checkout'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid vh-100 d-flex justify-content-start">
    <div class="col-lg-8 col-md-9">

        <div class="checkout-card p-4">

            <!-- Bigger Heading -->
            <h4 class="mb-4 text-center text-primary fs-3">
                Secure Payment
            </h4>

            <div class="row g-4">

                <!-- LEFT SIDE -->
                <div class="col-md-7">
                    <form>

                        <div class="mb-3">
                            <label class="form-label fs-6">Full Name</label>
                            <input type="text" class="form-control fs-6" value="Mazhar Ali">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-6">Email</label>
                            <input type="email" class="form-control fs-6" value="mazhar@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-6">Card Number</label>
                            <input type="text" class="form-control fs-6" value="4242 4242 4242 4242">
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fs-6">Expiry</label>
                                <input type="text" class="form-control fs-6" value="12/28">
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label fs-6">CVC</label>
                                <input type="text" class="form-control fs-6" value="123">
                            </div>
                        </div>

                        <!-- Slightly bigger button text -->
                        <button type="submit" class="btn pay-btn w-100 mt-3 fs-6">
                            Pay $450.00
                        </button>

                        <p class="text-center text-muted mt-3 fs-6">
                            Secured by Stripe (Test Mode)
                        </p>

                    </form>
                </div>

                <!-- RIGHT SIDE -->
                <div class="col-md-5">

                    <div class="summary-box p-4">

                        <h6 class="mb-3 fs-5">Booking Summary</h6>

                        <p class="mb-2 fs-6"><strong>ID:</strong> #1025</p>
                        <p class="mb-2 fs-6"><strong>Room:</strong> Deluxe Suite</p>
                        <p class="mb-2 fs-6"><strong>Check-In:</strong> 01 Mar 2026</p>
                        <p class="mb-3 fs-6"><strong>Check-Out:</strong> 05 Mar 2026</p>

                        <hr class="my-3">

                        <div class="d-flex justify-content-between fs-6">
                            <span>Room</span>
                            <span>$400</span>
                        </div>

                        <hr class="my-3">

                        <!-- Bigger total -->
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total</span>
                            <span class="text-success">$450</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
<style>
    body {
        background-color: #1c1f26;
        overflow: hidden; /* prevents scroll */
    }

    .checkout-card {
        background: #23262d;
        border-radius: 15px;

    }

    .form-control {
        background-color: #2f3542;
        border: 1px solid #3d4454;
        color: #fff;
        height: 32px;
    }

    .form-control:focus {
        background-color: #2f3542;
        border-color: #0d6efd;
        box-shadow: none;
        color: #fff;
    }

    .summary-box {
        background: #2b3040;
        border-radius: 12px;
    }

    .pay-btn {
        background: linear-gradient(45deg, #0d6efd, #6610f2);
        border: none;
        font-weight: 600;
        border-radius: 8px;
    }

    .pay-btn:hover {
        opacity: 0.9;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views\stripe\index.blade.php ENDPATH**/ ?>