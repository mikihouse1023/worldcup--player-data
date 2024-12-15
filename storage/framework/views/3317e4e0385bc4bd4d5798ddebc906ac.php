<!DOCTYPE html>
<html>

<div class=player_details>

    <head>
        <title>選手データ</title>
        <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
    </head>

    <body class=detail_body>
        <h1>選手データ</h1>
        <table class=item>
            <tr>
                <th>No</th>
                <td><?php echo e($players->id); ?></td>
            </tr>
            <tr>
                <th>背番号</th>
                <td><?php echo e($players->uniform_num); ?></td>
            </tr>
            <tr>
                <th>ポジション</th>
                <td><?php echo e($players->position); ?></td>
            </tr>
            <tr>
                <th>名前</th>
                <td><?php echo e($players->name); ?></td>
            </tr>

            <tr>
                <th>国</th>
                <td><?php echo e($players->country_name); ?></td>
            </tr>
            <tr>
                <th>所属</th>
                <td><?php echo e($players->club); ?></td>
            </tr>
            <tr>
                <th>誕生日</th>
                <td><?php echo e($players->birth); ?></td>
            </tr>
            <tr>
                <th>身長</th>
                <td><?php echo e($players->height); ?></td>
            </tr>
            <tr>
                <th>体重</th>
                <td><?php echo e($players->weight); ?></td>
            </tr>
            <tr>
                <th>総得点</th>
                <td>
                <?php echo e($total_goals > 0 ? $total_goals . '点': '無得点です。'); ?>

                </td>
            </tr>

            <tr>
                <th>得点履歴</th>
                <td>
                <?php if($total_goals > 0): ?>
                <ul>
                <?php $__currentLoopData = $goal_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($detail['kickoff']); ?> <?php echo e($detail['enemy_country']); ?>戦 <?php echo e($detail['goal_time']); ?> (<?php echo e($detail['goal_number']); ?>)</p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>    
                </td>
            </tr>
        </table>
    
        <!--
        <button id= "player_edit_button" class = detail_edit>編集</button>-->
        <!--URLにクエリパラメータとしてpage。
        session('page', 1)はセッションから現在のページ番号を取得し、デフォルト値として1を指定-->
       <button id="back_button" class=detail_back  onclick="location.href='<?php echo e(route('players.index' , ['page' => session('page', 1)])); ?>'"><a>戻る</a></button>

    </body>
</div>

</html><?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/players/show.blade.php ENDPATH**/ ?>