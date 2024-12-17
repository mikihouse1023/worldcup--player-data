<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use Illuminate\Support\Facades\DB;


class PlayersController extends Controller
{
    /*プレイヤーの一覧を表示*/
    public function index(Request $request)
    {
        /*修正前
        $players = DB::table('players')->paginate(20);
        //$players = DB::table('players')->where('del_flg', 0)->paginate(20);
        //$request->session()->put('page', $request->get('page', 1));
        //return view('players.players', ['players' => $players]);*/
        $userCountryId = auth()->user()->country_id;  // ログインしているユーザーのcountry_idを取得

        $players = DB::table('players')
            ->where('del_flg', 0)
            ->where('country_id', $userCountryId)  // country_idがログインユーザーと同じ選手のみ取得
            ->paginate(20);
    
        $request->session()->put('page', $request->get('page', 1));
    
        return view('players.players', ['players' => $players]);
    }




    public function show($id)
    { $userRole = auth()->user()->role;

        $players = DB::table('players')
            ->join('countries', 'players.country_id', '=', 'countries.id')
            ->select('players.*', 'countries.name as country_name')
            ->where('players.id', $id)
            ->first();
    
        $goals = DB::table('goals')->where('player_id', $id)->get();
    
        $goal_details = $goals->map(function ($goal, $index) {
            $pairing = DB::table('pairings')->where('id', $goal->pairing_id)->first();
            $enemy_country = DB::table('countries')->where('id', $pairing->enemy_country_id)->first();
    
            return [
                'kickoff' => $pairing->kickoff,
                'enemy_country' => $enemy_country->name,
                'goal_time' => $goal->goal_time,
                'goal_number' => $index + 1 . '点目'
            ];
        });
    
        $total_goals = $goals->count();
    
        return view('players.show', [
            'players' => $players,
            'goal_details' => $goal_details,
            'total_goals' => $total_goals,
            'role' => $userRole
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

    public function general()
    {
        $players = Player::all(); // 適切なデータを取得
        return view('players.general', compact('players'));
    }

}

