<!DOCTYPE html>
<html>

<head>
    <title>Laravel_1</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

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
        @foreach ($players as $player)
        <tr>
            <td>{{ $player->id }}</td>
            <td>{{ $player->uniform_num }}</td>
            <td>{{ $player->position }}</td>
            <td>{{ $player->club }}</td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->birth }}</td>
            <td>{{ $player->height }}</td>
            <td>{{ $player->weight }}</td>
            <td><a class="details"  href="{{ route('players.show', $player->id) }}">詳細</a></td>
        </tr>

        @endforeach
    </table>
    <div class="pagination">

        {{ $players->links() }}

    </div>


</body>

</html>