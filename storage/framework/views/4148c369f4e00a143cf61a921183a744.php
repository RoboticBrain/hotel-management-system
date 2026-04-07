<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f0f0f;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .card {
            background: #1c1c1c;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            color: #fff;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0,0,0,0.6);
        }

        .form-control {
            background: #2a2a2a;
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-control:focus {
            background: #2a2a2a;
            color: #fff;
            box-shadow: none;
            border: 1px solid #555;
        }

        .btn-custom {
            background: #444;
            border: none;
        }

        .btn-custom:hover {
            background: #666;
        }

        .title {
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #1e4620;
            border: none;
            color: #9be79b;
        }

        .alert-danger {
            background-color: #4a1c1c;
            border: none;
            color: #ff9b9b;
        }
    </style>
</head>
<body>

<div class="card p-4 flex flex-column justify-content-center align-items-center gap2">

    <h4 class="title">Forgot Password</h4>

    <!-- ✅ Success Message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('email')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('email')); ?>

        </div>
    <?php endif; ?>

    <!-- ❌ Error Message -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('profile.reset.password')); ?>">
        <?php echo csrf_field(); ?> 

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input 
                name="email" 
                type="email" 
                class="form-control" 
                placeholder="Enter your email" 
                value="<?php echo e(old('email')); ?>"
                required
            >
        </div>

        <button type="submit" class="btn btn-custom w-100 text-white bg-success">
            Send Reset Link
        </button>
    </form>

        <div class="mt-4">
           <a href="<?php echo e(route('login')); ?>"><button class="btn btn-primary bg-primary ">Login</button></a> 
        </div>
    </div>

</body>
</html><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/user/profile/password-reset.blade.php ENDPATH**/ ?>