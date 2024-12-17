<!DOCTYPE html>
<html>

<head>
    <title>新規登録画面</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body class="register_body">

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="register-container">
            <h1>新規登録画面</h1>
            <div class="email_form">
                @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
                @endif
                <div class="email">ログインID:
                    <input id="email" placeholder="メールアドレス" type="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="password_form">
                @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
                <div class="password">パスワード:
                    <input id="password" placeholder="パスワード" type="password" name="password" required>
                </div>
            </div>

            <div class="password_confirmation_form">
                @if ($errors->has('password_confirmation'))
                <span class="error">{{ $errors->first('password_confirmation') }}</span>
                @endif
                <div class="password_confirmation">パスワード確認:
                    <input id="password_confirmation" placeholder="パスワード確認" type="password" name="password_confirmation" required>
                </div>
            </div>

            <div class="radio_form">
                <div class="radio">ユーザー種別選択:
                    <div class=radio_group>
                        <input type="radio" name="user_type" value="normal" checked> 一般ユーザー
                        <input type="radio" name="user_type" value="admin"> 管理ユーザー
                    </div>
                </div>
            </div>

            <div class="country_select_form">
                <div class="country_select">所属国選択:
                   
                        <select id="country" name="country_id">
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                
                </div>
            </div>

            <button type="submit" id="register_button">登録</button>
            <button type="button" onclick="location.href='{{ route('login') }}'" id="back_to_login_button">ログイン画面に戻る</button>
    </form>
    </div>

    <script>
        function confirmRegister() {
            return confirm('この情報でユーザー登録しますか?');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const userTypes = document.getElementsByName('user_type');
            const countrySelect = document.getElementById('country');

            userTypes.forEach(type => {
                type.addEventListener('change', function() {
                    if (this.value === 'admin') {
                        countrySelect.disabled = true;
                    } else {
                        countrySelect.disabled = false;
                    }
                });
            });

            // 初回読み込み時の制御
            if (document.querySelector('input[name="user_type"]:checked').value === 'admin') {
                countrySelect.disabled = true;
            }
        });
    </script>

</body>

</html>