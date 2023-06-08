<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gamesController extends Controller
{
    function index(){
        $data=Game::all();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $id_req = DB::table('requirements')->insertGetId([
            'CPU' => $request->CPU,
            'GPU' => $request->GPU,
            'Memory' => $request->Memory,
            'VRAM' => $request->VRAM,
            'Storage' => $request->Storage
        ]);
        DB::table('games')->insert([
            'name_game' => $request->name_game,
            'link_game' => $request->link_game,
            'dateS_game' => $request->dateS_game,
            'description_game' => $request->description_game,
            'image_game' => $request->image_game,
            'id_requirement' => $id_req,
            'id_category '=> $request->id_category,
        ]);
        return response()->json(['message' => 'Game added successfully'], 201);
    }
        
    public function update(Request $request, $id_game)
    {
        $game = Game::find($id_game);
        $game->update($request->all());
        return response()->json('Game updated');
    }
    public function destroy($id_game)
    {
        $game = Game::find($id_game);
        $game->delete();
        return response()->json(' deleted!');
    }
}


