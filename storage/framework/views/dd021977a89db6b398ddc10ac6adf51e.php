<!DOCTYPE html>
<html>

<head>
    <title>Laravel_1</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">

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
            <td><a class="details"  href="<?php echo e(route('players.show', $player->id)); ?>">詳細</a></td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="pagination">

        <?php echo e($players->links()); ?>


    </div>


</body>

</html><?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/players/players.blade.php ENDPATH**/ ?>