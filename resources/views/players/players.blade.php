<!DOCTYPE html>
<html>

<head>
    <title>選手リスト</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <button onclick="location.href='{{ route('login') }}'">ログイン画面に戻る</button>
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
            <!--<td><a class="details"  href="{{ route('players.show', $player->id) }}">詳細</a></td>-->
            <td><button class="details" id=detail_button onclick="location.href='{{ route('players.show', $player->id) }}'">詳細</button></td>
            <td><button class="edit" id=edit_button onclick="location.href='{{ route('players.edit', $player->id) }}'">編集</button></td>

            <form id="delete-form-{{ $player->id }}" method="POST" action="{{ route('players.destroy', $player->id) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            <td><button class="delete" id=delete_button onclick="confirmDelete({{ $player->id }})"> 削除</button></td>
        </tr>

        @endforeach
    </table>
    <!--ページネーションはテーブルの下-->
    <div class="pagination">

        {{ $players->links() }}

    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("この選手データを削除しますか？")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>

</body>

</html>