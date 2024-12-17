<?php

namespace App\Http\Controllers\Auth;
//DBに接続。[国]のドロップダウンメニュー作成に必要
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
     //登録ページ
     public function showRegistrationForm()
     {
         return view('auth.register');
     }
//DBに接続。[国]のドロップダウンメニュー作成に必要
     public function create()
     {
         $countries = DB::table('countries')->get();
         return view('auth.register', compact('countries'));
     }


     public function store(Request $request)
{     // リクエストデータをダンプ
  

    $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
    ]);

    $role = $request->user_type === 'admin' ? 0 : 1;
    $country_id = $request->user_type === 'admin' ? 0 : $request->country_id;
    dd($request->all());
    User::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'country_id' => $country_id,
        'role' => $role,
    ]);

    return redirect()->route('login');
 
}
}
