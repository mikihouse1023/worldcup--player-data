<!DOCTYPE html>
<html>

<head>
    <title>ログイン画面</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body class=login_body>
<!--
・novalidate:フォーム側のバリデーション処理が先に動き、コントローラー側のバリデーション処理が動作しなくなるのを防ぐ-->
    <form method="POST" action="{{ route('login') }}"novalidate>
        @csrf
        <div class="login-container">
            <h1>ログイン</h1>
            <div class=email_form>
            @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
            @endif
            <div class="email"><p>メールアドレス:</p>
           
                    <input id="email" placeholder="メールアドレス" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
            
           <div class= password_form>
            @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
            <div class="password">
                <div class="password_password">
                    パスワード:</div>
                <input id="password" placeholder="パスワード" type="password" name="password" required>
            </div>
            
            <div class= "login_button_body">
            <button id="login_button" type="submit">ログイン</button>
            </div>
            <div class="register_link_body">
    <a class="new_account" href="{{ route('register') }}">新規登録はこちら</a>
</div>
   </div>

        </form>
    </div>
</body>

</html>