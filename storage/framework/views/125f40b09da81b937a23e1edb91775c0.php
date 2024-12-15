<!DOCTYPE html>
<html>
<div class=player_details>

    <head>
        <title>選手データ編集</title>
        <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
    </head>

    <body class=detail_body>


        <h1>選手データ編集</h1>

        <form action="<?php echo e(route('players.update', $player->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <table class="item">
                <tr>
                    <th>No</th>
                    <td><?php echo e($player->id); ?></td>
                </tr>
                <tr>
                    <th>背番号</th>
                    <td><!--バリデーション-->
                        <?php $__errorArgs = ['uniform_num'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input class="edit_item" type="text" name="uniform_num" value="<?php echo e(old('uniform_num', $player->uniform_num)); ?>">

                    </td>
                </tr>
                <tr>
                    <th>ポジション</th>
                    <td>
                        <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input class="edit_item" type="text" name="position" value="<?php echo e(old('position', $player->position)); ?>">

                    </td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input class="edit_item" type="text" name="name" value="<?php echo e(old('name', $player->name)); ?>">

                    </td>
                </tr>
                <tr>
                    <th>国</th>
                    <td>
                        <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <select class="edit_item" name="country_id">
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>" <?php echo e($player->country_id == $country->id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <th>所属</th>
                    <td>
                        <?php $__errorArgs = ['club'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input class="edit_item" type="text" name="club" value="<?php echo e(old('club', $player->club)); ?>">

                    </td>
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td>
                        <?php $__errorArgs = ['birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input class="edit_item" type="date" name="birth" value="<?php echo e(old('birth', $player->birth)); ?>">

                    </td>
                </tr>
                <tr>
                    <th>身長</th>
                    <td>
                        <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input class="edit_item" type="text" name="height" value="<?php echo e(old('height', $player->height)); ?>">

                    </td>
                </tr>
                <tr>
                    <th>体重</th>
                    <td>
                        <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input class="edit_item" type="text" name="weight" value="<?php echo e(old('weight', $player->weight)); ?>">

                    </td>
                </tr>
            </table>

            <div class="button_edit">
                <button id="edit_edit_button" onclick="location.href='<?php echo e(route('players.edit', $player->id)); ?>'"><a>編集</a></button>
                <button id="edit_back_button" type="button" onclick="location.href='<?php echo e(route('players.index')); ?>'"><a>戻る</a></button>
            </div>                            <!--↑error発生時でも戻れるように-->
        </form>
    </body>
</div>

</html><?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/players/edit.blade.php ENDPATH**/ ?>