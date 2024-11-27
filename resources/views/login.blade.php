<!DOCTYPE html>
<html>
<head>
    <title>ログイン画面</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
    <div class="login-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>ログイン画面</h2>
            <div>
                <label for="email">メールアドレス:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div>
                <label for="password">パスワード:</label>
                <input id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit">ログイン</button>
        </form>
    </div>
</body>
</html>


