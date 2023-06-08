<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class updateController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id_user);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        $user->save();
    
        return response()->json([
            'success' => true,
            'message' => 'User updated successfully.',
            'data' => $user
        ]);
    }
}
