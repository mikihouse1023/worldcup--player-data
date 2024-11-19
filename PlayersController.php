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

use Illuminate\Support\Facades\DB;

class PlayersController extends Controller
{
    public function index()
    {
        $players = DB::table('players')->paginate(20);
        return view('players.players', ['players' => $players]);
    }

    public function show($id)
    {
        $player = DB::table('players')->where('id', $id)->first();
        return view('players.show', ['player' => $player]);
    }
}
