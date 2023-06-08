<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
    {
         $category = DB::table('categories')
            ->where('genre_category', $request->genre_category)
            ->first();

        if (!isset($category)) {
            $id_cat = DB::table('categories')->insertGetId([
                'genre_category' => $request->genre_category
            ]);
        } else {
            $id_cat = $category->id_category;
        }

        // $id_req = DB::table('requirements')->insertGetId([
        //     'CPU' => $request->CPU,
        //     'GPU' => $request->GPU,
        //     'Memory' => $request->Memory,
        //     'VRAM' => $request->VRAM,
        //     'Storage' => $request->Storage,
        // ]);

        $requirement = DB::table('requirements')
        ->where('CPU', $request->CPU)
        ->where('GPU', $request->GPU)
        ->where('Memory', $request->Memory)
        ->where('VRAM', $request->VRAM)
        ->where('Storage', $request->Storage)
        ->first();
        if (isset($requirement)) {
            $id_req = $requirement->id_requirement;
        } else {
            $id_req = DB::table('requirements')->insertGetId([
                'CPU' => $request->CPU,
                'GPU' => $request->GPU,
                'Memory' => (int) $request->Memory,
                'VRAM' => (int) $request->VRAM,
                'Storage' =>(int)  $request->Storage,
            ]);
    }
    DB::table('games')->insert([
        'name_game' => $request->name_game,                              
        'link_game' => $request->link_game,
        'dateS_game' => $request->dateS_game,
        'description_game' => $request->description_game,
        'image_game' => $request->image_game,
        'id_requirement' => isset($requirement) ? $requirement->id_requirement : $id_req,
        'id_category' => $id_cat
    ]);
        return response()->json(['message' => 'Game added successfully'], 201);
    }
        
    public function update(Request $request, $id_game)
    {
        $category = DB::table('categories')
        ->where('genre_category', $request->genre_category)
        ->first();

        if (!isset($category)) {
            $id_cat = DB::table('categories')->insertGetId([
                'genre_category' => $request->genre_category
            ]);
        } else {
            $id_cat = $category->id_category;
        }

        $requirement = DB::table('requirements')
        ->where('CPU', strval($request->CPU))
        ->where('GPU', strval($request->GPU))
        ->first();

        if (isset($requirement)) {
            $id_req = $requirement->id_requirement;
        } else {
            $id_req = DB::table('requirements')->insertGetId([
                'CPU' => strval($request->CPU),
                'GPU' => strval($request->GPU),
                'Memory' => (int) $request->Memory,
                'VRAM' => (int) $request->VRAM,
                'Storage' =>(int)  $request->Storage,
            ]);
    }
            // DB::table('games')
            // ->where('id_game',$request->id_game)
            // ->update([
            //     'name_game' => $request->name_game,
            //     'link_game' => $request->link_game,
            //     'dateS_game' => $request->dateS_game,
            //     'description_game' => $request->description_game,
            //     'image_game' => $request->image_game,
            //     'id_category' => $request->id_category,
            //     'id_requirement' => $request->id_requirement
            // ]);
            // return response()->json(['message' => 'Game updated successfully'], 200);
            $game = Game::find($request->id_game);
            if ($game) {
                $game->name_game = $request->name_game;
                $game->link_game = $request->link_game;
                $game->dateS_game = $request->dateS_game;
                $game->description_game = $request->description_game;
                $game->image_game = $request->image_game;
                $game->id_category = $id_cat;
                $game->id_requirement = $requirement ? $requirement->id_requirement : $id_req;
                $game->save();
                return response()->json(['message' => 'Game updated successfully'], 200);
            } else {
                return response()->json(['message' => 'Game not found'], 404);
            }


}


    public function destroy($id_game)
    {
        $game = Game::find($id_game);
        $game->delete();
        return response()->json(' deleted!');
    }

    public function repport(Request $request)
    {

        DB::table('reports')->insert([
            'description_comment' => $request->description_comment,
            'id_user' => $request->id_user,
            'id_game' => $request->id_game ,
        ]);
        return response()->json(['message' => 'repport added successfully'], 201);
    }


}
    

