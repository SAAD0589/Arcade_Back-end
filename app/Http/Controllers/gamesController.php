<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;

class gamesController extends Controller
{
    function index(){
        // $data=Game::all();
        // return response()->json($data);
        // $games = Game::paginate(10);
        // return response()->json($games->toJson());
        $games = Game::paginate(4); // Retrieve games with 10 items per page
        return response()->json($games);
    }
    function allgames(){
        $data=Game::all();
        return response()->json($data);
    }
    
    
}
