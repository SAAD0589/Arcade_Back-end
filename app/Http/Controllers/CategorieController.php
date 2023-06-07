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
}
