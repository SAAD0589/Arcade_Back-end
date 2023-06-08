<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    function index(){
        $data=Category::all();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $Categorie = new Category([
            'genre_category' => $request->input('genre_category'),
        ]);
        $Categorie->save();
        return response()->json('game created!');
    }
}
