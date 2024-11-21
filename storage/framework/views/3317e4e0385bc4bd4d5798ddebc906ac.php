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
                <td><?php echo e($player->id); ?></td>
            </tr>
            <tr>
                <th>背番号</th>
                <td><?php echo e($player->uniform_num); ?></td>
            </tr>
            <tr>
                <th>ポジション</th>
                <td><?php echo e($player->position); ?></td>
            </tr>
            <tr>
                <th>名前</th>
                <td><?php echo e($player->name); ?></td>
            </tr>
            <tr>
                <th>所属</th>
                <td><?php echo e($player->club); ?></td>
            </tr>
            <tr>
                <th>誕生日</th>
                <td><?php echo e($player->birth); ?></td>
            </tr>
            <tr>
                <th>身長</th>
                <td><?php echo e($player->height); ?></td>
            </tr>
            <tr>
                <th>体重</th>
                <td><?php echo e($player->weight); ?></td>
            </tr>
        </table>
        <a id="back_index" class=戻る href="<?php echo e(route('players.index')); ?>">戻る</a>
    </body>
</div>

</html><?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/players/show.blade.php ENDPATH**/ ?>