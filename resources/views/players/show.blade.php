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
                <td>{{ $player->id }}</td>
            </tr>
            <tr>
                <th>背番号</th>
                <td>{{ $player->uniform_num }}</td>
            </tr>
            <tr>
                <th>ポジション</th>
                <td>{{ $player->position }}</td>
            </tr>
            <tr>
                <th>名前</th>
                <td>{{ $player->name }}</td>
            </tr>
            <tr>
                <th>所属</th>
                <td>{{ $player->club }}</td>
            </tr>
            <tr>
                <th>誕生日</th>
                <td>{{ $player->birth }}</td>
            </tr>
            <tr>
                <th>身長</th>
                <td>{{ $player->height }}</td>
            </tr>
            <tr>
                <th>体重</th>
                <td>{{ $player->weight }}</td>
            </tr>
        </table>
        <a id="back_index" class=戻る href="{{ route('players.index') }}">戻る</a>
    </body>
</div>

</html>