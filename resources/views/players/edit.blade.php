<!DOCTYPE html>
<html>
<div class=player_details>

    <head>
        <title>選手データ編集</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>

    <body class=detail_body>


        <h1>選手データ編集</h1>

        <form action="{{ route('players.update', $player->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="item">
                <tr>
                    <th>No</th>
                    <td>{{ $player->id }}</td>
                </tr>
                <tr>
                    <th>背番号</th>
                    <td><!--バリデーション-->
                        @error('uniform_num')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <input class="edit_item" type="text" name="uniform_num" value="{{ old('uniform_num', $player->uniform_num) }}">

                    </td>
                </tr>
                <tr>
                    <th>ポジション</th>
                    <td>
                        @error('position')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <input class="edit_item" type="text" name="position" value="{{ old('position', $player->position) }}">

                    </td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <input class="edit_item" type="text" name="name" value="{{ old('name', $player->name) }}">

                    </td>
                </tr>
                <tr>
                    <th>国</th>
                    <td>
                        @error('country_id')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <select class="edit_item" name="country_id">
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ $player->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <th>所属</th>
                    <td>
                        @error('club')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <input class="edit_item" type="text" name="club" value="{{ old('club', $player->club) }}">

                    </td>
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td>
                        @error('birth')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <input class="edit_item" type="date" name="birth" value="{{ old('birth', $player->birth) }}">

                    </td>
                </tr>
                <tr>
                    <th>身長</th>
                    <td>
                        @error('height')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <input class="edit_item" type="text" name="height" value="{{ old('height', $player->height) }}">

                    </td>
                </tr>
                <tr>
                    <th>体重</th>
                    <td>
                        @error('weight')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <input class="edit_item" type="text" name="weight" value="{{ old('weight', $player->weight) }}">

                    </td>
                </tr>
            </table>

            <div class="button_edit">
                <button id="edit_edit_button" onclick="location.href='{{ route('players.edit', $player->id) }}'"><a>編集</a></button>
                <button id="edit_back_button" type="button" onclick="location.href='{{ route('players.index') }}'"><a>戻る</a></button>
            </div>                            <!--↑error発生時でも戻れるように-->
        </form>
    </body>
</div>

</html>