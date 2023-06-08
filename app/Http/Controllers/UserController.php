<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    function index(){
        $data=User::all();
        return response()->json($data);
    }
    public function destroy($id_user )
    {
        $user = User::find($id_user );
        $user->delete();
        return response()->json(' deleted!');
    }
}
