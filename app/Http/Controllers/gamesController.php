<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;

class gamesController extends Controller
{
    function index(){
        $data=Game::all();
        echo json_encode($data);
        return response()->json($data);
    }
}
