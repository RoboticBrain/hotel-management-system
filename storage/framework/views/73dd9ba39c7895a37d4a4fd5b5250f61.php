<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default Password</title>

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #0f0f0f;
            color: #ffffff;
            font-family: 'Inter', Arial, sans-serif;
            padding: 30px;
        }
        .container {
            background-color: #1c1c1c;
            padding: 25px 30px;
            border-radius: 12px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 15px rgba(0,0,0,0.6);
        }
        h2 {
            color: #fff;
            margin-bottom: 15px;
            text-align: center;
            font-weight: 700;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            text-align: center;
            font-weight: 400;
        }
        .password {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #2a2a2a;
            border-radius: 6px;
            font-weight: 600;
            color: #9be79b;
            font-size: 18px;
            font-family: 'Inter', Arial, sans-serif;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #aaa;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Your Account is Ready</h2>
        <p>We have set a default password for your account. Please use it to login and change it after your first login.</p>
        <div class="password">
            <?php echo e($password); ?>

        </div>
        <div class="footer">
            Thank you for using our service!
        </div>
    </div>
</body>
</html><?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/emails/password-reset.blade.php ENDPATH**/ ?>