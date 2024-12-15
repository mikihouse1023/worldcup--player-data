<!DOCTYPE html>
<html>

<head>
    <title>ログイン画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
</head>

<body class=login_body>
<!--
・novalidate:フォーム側のバリデーション処理が先に動き、コントローラー側のバリデーション処理が動作しなくなるのを防ぐ-->
    <form method="POST" action="<?php echo e(route('login')); ?>"novalidate>
        <?php echo csrf_field(); ?>
        <div class="login-container">
            <h1>ログイン</h1>
            <div class=email_form>
            <?php if($errors->has('email')): ?>
            <span class="error"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
            <div class="email"><p>メールアドレス:</p>
           
                    <input id="email" placeholder="メールアドレス" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                
                </div>
            </div>
           <div class= password_form>
            <?php if($errors->has('password')): ?>
                <span class="error"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            <div class="password">
                <div class="password_password">
                    パスワード:</div>
                <input id="password" placeholder="パスワード" type="password" name="password" required>
            </div>
            
            <div class= "login_button_body">
            <button id="login_button" type="submit">ログイン</button>
            </div>
            <div class="register_link_body">
    <a href="<?php echo e(route('register')); ?>">新規登録はこちら</a>
</div>
   </div>

        </form>
    </div>
</body>

</html><?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/auth/login.blade.php ENDPATH**/ ?>