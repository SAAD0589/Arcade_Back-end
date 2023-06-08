<?php

namespace App\Http\Controllers;
use App\Models\Download;
use Illuminate\Http\Request;

class DowController extends Controller
{
    function create(Request $request){
        $date=now();
        $dow = new Download();
        $dow->id_game = $request->idG;
        $dow->id_user = $request->id;
        $dow->date_download = $date;
        $dow->save();
    }
}
