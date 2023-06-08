<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Testing\Fakes\Fake;

class favController extends Controller
{
    function index(){
        $fav= Favorite::all();
        return $fav;
    }
    function show(){
        $fav = Favorite::where('id_user', Auth::user()->id_user)->get();
        $games = [];
        foreach ($fav as $f) {
            $game = Game::where('id_game', $f->id_game)->get();
            $games[] = $game;
        }
        
        return $games;
    }
    function create(Request $request){
        $fav = new Favorite();
        $fav->id_game = $request->idG;
        $fav->id_user = $request->id;
        $fav->save();
    }
    function delete(Request $request){
        $fav = Favorite::where('id_user', $request->id)
        ->where('id_game', $request->idG)
        ->delete();
    }
}
