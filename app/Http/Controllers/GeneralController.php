<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GeneralController extends Controller
{
    public function index(Request $request)
    {        /*playersテーブルからプレイヤーのデータを取得し、1ページあたり
        　20件ずつに分けてページネーションを行う*/
        /*7-2で論理削除された選手を表示しないようにクエリを変更*/
        //$players = DB::table('players')->paginate(20);
        $players = DB::table('players')->where('del_flg', 0)->paginate(20);
        /*
        〇$request->get('page', 1)
        リクエストクエリから現在のページ番号を取得する。デフォルトは1。
        〇$request->session()->put('page', ...)
         セッションに現在のページ番号を保存。
         セッションに保存することで、後に表示するリンク（戻るためのURL）に
         この情報を利用して適切なページに戻れるようになる
        */
        $request->session()->put('page', $request->get('page', 1));

        /*playersフォルダのplayers.blade.phpファイル。
          ファイル内のplayersというビューにplayersという名前の変数を
          渡してビューをレンダリング*/
        return view('players.general', ['players' => $players]);

    }
}
