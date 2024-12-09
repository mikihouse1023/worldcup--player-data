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
    public function index(Request $request)
    {
        /*playersテーブルからプレイヤーのデータを取得し、1ページあたり
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
    */
        $referer = request()->headers->get('referer');


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
        //$players = DB::table('players')->where('id', $id)->first();

        /*playersフォルダのshow.blade.phpファイル。
        　ファイル内のplayersというビューにplayersという名前の変数を
          渡してビューをレンダリング*/
        //return view('players.show', ['players' => $players]);

        /*7-2*/
        // 選手情報を取得
        $players = DB::table('players')
        /*playersテーブルと、countriesテーブルをcountry_idをキーに結合する。
        　これによりプレイヤーの所属国情報も取得できる。*/
            ->join('countries', 'players.country_id', '=', 'countries.id')
        
            ->select('players.*', 'countries.name as country_name')
            ->where('players.id', $id)
            ->first();

        // 選手の総得点と得点履歴を取得
        $goals = DB::table('goals')->where('player_id', $id)->get();

        $goal_details = $goals->map(function ($goal, $index) {
            $pairing = DB::table('pairings')->where('id', $goal->pairing_id)->first();
            $enemy_country = DB::table('countries')->where('id', $pairing->enemy_country_id)->first();

            return [
                'kickoff' => $pairing->kickoff,
                'enemy_country' => $enemy_country->name,
                'goal_time' => $goal->goal_time,
                /*インデックスに1を足し、[1点目][2点目]といったラベルを作成*/
                'goal_number' => $index + 1 . '点目'
            ];
        });

        $total_goals = $goals->count();
        // 得点情報を含む変数をビューに渡す
        return view('players.show', [
            'players' => $players,
            'goal_details' => $goal_details,
            'total_goals' => $total_goals
        ]);
    }

    /*編集*/
    public function edit($id)
    {
        $player = DB::table('players')->where('id', $id)->first();
        $countries = DB::table('countries')->get();

        return view('players.edit', compact('player', 'countries'));
    }


    public function update(Request $request, $id)
    {  $request->validate([
        'uniform_num' => 'required|numeric', // 必須入力 & 半角数字
        'position' => 'required', // 必須入力
        'name' => 'required', // 必須入力
        'country_id' => 'required', // 必須入力
        'club' => 'required', // 必須入力
        'birth' => 'required|date_format:Y-m-d', // 必須入力 & 日付フォーマット
        'height' => 'required|numeric', // 必須入力 & 半角数字
        'weight' => 'required|numeric', // 必須入力 & 半角数字
    ], [
        // エラーメッセージの設定
        'required' => 'この項目は必須入力です。',
        'numeric' => 'この項目は半角数字で入力してください。',
        'date_format' => 'この項目は「YYYY-MM-DD」で入力してください。',
    ]);

    // プレイヤーデータの更新
    DB::table('players')->where('id', $id)->update($request->only([
        'uniform_num',
        'position',
        'name',
        'country_id',
        'club',
        'birth',
        'height',
        'weight'
    ]));

    return redirect()->route('players.index')->with('success', '選手情報が更新されました');
      
    }

    /*論理削除*/
    public function destroy($id)
    {
        DB::table('players')
            ->where('id', $id)
            ->update(['del_flg' => 1]);

        return redirect()->route('players.index');
    }


}



