<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    function index(){
        $data=Requirement::all();
        return response()->json($data);
    }
}
