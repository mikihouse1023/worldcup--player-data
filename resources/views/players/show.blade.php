<!DOCTYPE html>
<html>

<div class=player_details>

    <head>
        <title>選手データ</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>

    <body class=detail_body>
        <h1>選手データ</h1>
        <table class=item>
            <tr>
                <th>No</th>
                <td>{{ $players->id }}</td>
            </tr>
            <tr>
                <th>背番号</th>
                <td>{{ $players->uniform_num }}</td>
            </tr>
            <tr>
                <th>ポジション</th>
                <td>{{ $players->position }}</td>
            </tr>
            <tr>
                <th>名前</th>
                <td>{{ $players->name }}</td>
            </tr>
            <tr>
                <th>所属</th>
                <td>{{ $players->club }}</td>
            </tr>
            <tr>
                <th>誕生日</th>
                <td>{{ $players->birth }}</td>
            </tr>
            <tr>
                <th>身長</th>
                <td>{{ $players->height }}</td>
            </tr>
            <tr>
                <th>体重</th>
                <td>{{ $players->weight }}</td>
            </tr>
        </table>
        <!--URLにクエリパラメータとしてpage。
        session('page', 1)はセッションから現在のページ番号を取得し、デフォルト値として1を指定-->
        <a id="back_index" class=戻る href="{{ route('players.index' , ['page' => session('page', 1)])}}">戻る</a>
    </body>
</div>

</html>