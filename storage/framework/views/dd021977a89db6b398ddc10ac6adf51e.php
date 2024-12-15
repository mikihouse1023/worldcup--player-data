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
            <th class=編集></th>
            <th class=削除></th>
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
            <td><button class="edit" id=edit_button onclick="location.href='<?php echo e(route('players.edit', $player->id)); ?>'">編集</button></td>

            <form id="delete-form-<?php echo e($player->id); ?>" method="POST" action="<?php echo e(route('players.destroy', $player->id)); ?>" style="display: none;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
            </form>
            <td><button class="delete" id=delete_button onclick="confirmDelete(<?php echo e($player->id); ?>)"> 削除</button></td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <!--ページネーションはテーブルの下-->
    <div class="pagination">

        <?php echo e($players->links()); ?>


    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("この選手データを削除しますか？")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>

</body>

</html><?php /**PATH C:\7_PHP応用\educure-WorldCup\curriculum\laravel\curriculum-app\resources\views/players/players.blade.php ENDPATH**/ ?>