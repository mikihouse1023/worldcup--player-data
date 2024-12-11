<!DOCTYPE html>
<html>

<head>
    <title>ログイン画面</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body class=login_body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-container">
            <h1>ログイン画面</h1>
            @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
            @endif
            <div class="email">メールアドレス:
                <div class="email_form">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                </div>
            </div>
           

            <div class="password">
            @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
                <div class="password_password">
                    パスワード</div>
                : <input id="password" type="password" name="password" required>

            </div>
            <button id="login_button" type="submit">ログイン</button>
    </form>
    </div>
</body>

</html>