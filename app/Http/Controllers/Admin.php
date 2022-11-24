<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\DeleteUserRequest;

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

    /**
     * @throws \Exception
     */
    public function destroy(DeleteUserRequest $request)
    {
        User::find($request->userId)->delete();

        return back()->with('mensaje','Usuario eliminado');
    }
    public function changePass()
    {
        return view('auth.passwords.reset');
    }
}
