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
    public function store(Request $request)
    {
        $Requirement = new Requirement([
            'CPU' => $request->input('CPU'),
            'GPU' => $request->input('GPU'),
            'Memory' => $request->input('Memory'),
            'VRAM' => $request->input('VRAM'),
            'Storage' => $request->input('Storage'),
        ]);
        $Requirement->save();
        return  $Requirement->id_requirement;
    }
}
