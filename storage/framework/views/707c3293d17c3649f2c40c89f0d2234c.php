<!DOCTYPE html>
<html>
<head>
    <title>新規登録画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
</head>
<body class="register_body">
   
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
            <div class="register-container">
            <h1>新規登録画面</h1>
            <div class="form-group">
                <?php if($errors->has('email')): ?>
                <span class="error"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
                <label for="email">ログインID:</label>
                <input id="email" placeholder="メールアドレス" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="form-group">
                <?php if($errors->has('password')): ?>
                <span class="error"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
                <label for="password">パスワード:</label>
                <input id="password" placeholder="パスワード" type="password" name="password" required>
            </div>

            <div class="form-group">
                <?php if($errors->has('password_confirmation')): ?>
                <span class="error"><?php echo e($errors->first('password_confirmation')); ?></span>
                <?php endif; ?>
                <label for="password_confirmation">パスワード確認:</label>
                <input id="password_confirmation" placeholder="パスワード確認" type="password" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label>ユーザー種別選択:</label><br>
                <input type="radio" name="user_type" value="normal" checked> 一般ユーザー
                <input type="radio" name="user_type" value="admin"> 管理ユーザー
            </div>

            <div class="form-group">
    <label for="country">所属国選択:</label>
    <select id="country" name="country_id">
        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

            <button type="submit" id="register_button">登録</button>
            <button type="button" onclick="location.href='<?php echo e(route('login')); ?>'" id="back_to_login_button">ログイン画面に戻る</button>
        </form>
    </div>

    <script>
    function confirmRegister() {
        return confirm('この情報でユーザー登録しますか?');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const userTypes = document.getElementsByName('user_type');
        const countrySelect = document.getElementById('country');

        userTypes.forEach(type => {
            type.addEventListener('change', function () {
                if (this.value === 'admin') {
                    countrySelect.disabled = true;
                } else {
                    countrySelect.disabled = false;
                }
            });
        });

        // 初回読み込み時の制御
        if (document.querySelector('input[name="user_type"]:checked').value === 'admin') {
            countrySelect.disabled = true;
        }
    });
</script>

</body>
</html>
<?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/auth/register.blade.php ENDPATH**/ ?>