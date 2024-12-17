<!DOCTYPE html>
<html>

<head>
    <title>選手リスト</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
    <button onclick="location.href='<?php echo e(route('login')); ?>'">ログイン画面に戻る</button>
<body>

    <table class=detail>
        <tr>
            <th class=No>No</th>
            <th class=uniform>背番号</th>
            <th class=position>ポジション</th>
            <th class=club>所属</th>
            <th class=name>名前</th>
            <th class=birth>誕生日</th>
            <th class=height>身長</th>
            <th class=weight>体重</th>
            <th class=詳細>

            </td>
        </tr>
        <!--単数形($player)を使用し、個々のプレイヤーを指し示すための一時的な変数名にする($playersだとエラーが発生)-->
        <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($player->id); ?></td>
            <td><?php echo e($player->uniform_num); ?></td>
            <td><?php echo e($player->position); ?></td>
            <td><?php echo e($player->club); ?></td>
            <td><?php echo e($player->name); ?></td>
            <td><?php echo e($player->birth); ?></td>
            <td><?php echo e($player->height); ?></td>
            <td><?php echo e($player->weight); ?></td>
            <!--<td><a class="details"  href="<?php echo e(route('players.show', $player->id)); ?>">詳細</a></td>-->
            <td><button class="details" id=detail_button onclick="location.href='<?php echo e(route('players.show', $player->id)); ?>'">詳細</button></td>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <!--ページネーションはテーブルの下-->
    <div class="pagination">

        <?php echo e($players->links()); ?>


    </div>



</body>

</html><?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/players/general.blade.php ENDPATH**/ ?>