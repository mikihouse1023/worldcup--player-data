<!DOCTYPE html>
<html>
<head>
    <title>ログイン画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
</head>
<body class=login_body>
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="login-container">
            <h1>ログイン画面</h1>
                <div class="email">メールアドレス:
                <div class="email_form">
        <?php if($errors->has('email')): ?>
            <span class="error"><?php echo e($errors->first('email')); ?></span>
        <?php endif; ?>
        <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
    </div>
</div>
           
                <div class="password">
                <div class= "password_password">    
                パスワード</div>
                :<input id="password" type="password" name="password" required>
                <?php if($errors->has('password')): ?>
                    <span class="error"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>
            <button id="login_button"  type="submit">ログイン</button>
        </form>
    </div>
</body>
</html>

<?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/auth/login.blade.php ENDPATH**/ ?>