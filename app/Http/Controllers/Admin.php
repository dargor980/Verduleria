<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class Admin extends Controller
{
    public function index()
    {
        $usuarios= DB::table('users')
                    ->where('users.name','<>',Auth::user()->name)
                    ->select('users.id','users.name')
                    ->orderBy('users.name','ASC')
                    ->get(); 
        return view('Admin.admin',compact('usuarios'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'userId' => 'required|not_in:0'
        ]);
        $destroyUser= User::find($request->userId);
        $destroyUser->delete();

        return back()->with('mensaje','Usuario eliminado');

    }
}
