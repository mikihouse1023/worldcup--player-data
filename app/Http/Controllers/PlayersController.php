<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
class PlayersController extends Controller
{


    public function index()
    {
        echo "Hello World";
    }
}
*/

/*
class PlayersController extends Controller {
    public function index() {
        $params = [
            'test' => 'これはテストです。',
            'sample' => 'これはサンプルです。'
        ];
        return view('players.index', compact('params'));
    }
}
*/

/*★7-1★*/
/*LaravelのファザードであるDBを使用するためにインポート*/
use Illuminate\Support\Facades\DB;

/*PlayersControllerはLaravelのControllerクラスを継承*/

class PlayersController extends Controller
{
    /*プレイヤーの一覧を表示*/
    public function index()
    {
        /*playersテーブルからプレイヤーのデータを取得し、1ページあたり
        　20件ずつに分けてページネーションを行う*/
        $players = DB::table('players')->paginate(20);
        /*playersフォルダのplayers.blade.phpファイル。
          ファイル内のplayersというビューにplayersという名前の変数を
          渡してビューをレンダリング*/
        return view('players.players', ['players' => $players]);
    }



    /*特定のプレイヤーの詳細情報を表示
    [$id]とはURLから渡されるプレイヤーのIDである*/
    public function show($id)
    {

        
    /*選手データ画面にダイレクトアクセス[http://localhost:8000/players/(プレイヤーのID)]
    された際に選手リスト画面[http://localhost]に遷移させる*/

    /* リファラ（参照元）の取得
    〇request():現在のHTTPリクエストにアクセスするためのLaravelのヘルパー関数
    〇headers->get('referer'):HTTPリクエストのヘッダーから「リファラ」フィールドを取得。
    〇リファラ:ユーザーが現在のページに遷移する前にアクセスしていたページのURL
    */    $referer = request()->headers->get('referer');

    
    /* リファラが存在しない、または選手リストの詳細からのアクセスでなければリダイレクトし
       選手リストに遷移
       〇!$referer:リファラが存在しない場合。
       ★!str_contains($referer, url('/'))
       〇str_contains:指定した文字列がリファラに含まれるかどうかをチェック
       〇url('/'):サイトのトップページを指す[http://localhost]
       */
        if (!$referer || !str_contains($referer, url('/'))) {

        /*上記の条件が満たされていない場合、
        ユーザーは players.indexルート[http://localhost]にリダイレクトされる。
        〇redirect()->route('[ルート]'):指定されたルートへユーザーを遷移*/
            return redirect()->route('players.index');
        }



        /*playersテーブルから指定したIDのプレイヤー情報を取得する
        　firstメソッドを使用し、[該当する単一のレコード]を取得*/
        $players = DB::table('players')->where('id', $id)->first();

        /*playersフォルダのshow.blade.phpファイル。
        　ファイル内のplayersというビューにplayersという名前の変数を
          渡してビューをレンダリング*/
        return view('players.show', ['players' => $players]);
    }
}


/*$players = DB ...
     ↑
{{ $players->id }}
*/

