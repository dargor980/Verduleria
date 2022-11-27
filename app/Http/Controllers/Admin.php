<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\DeleteUserRequest;
use Exception;

class Admin extends Controller
{
    public function index()
    {
        $usuarios = User::where('name', '<>', Auth::user()->name)
            ->select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get();

        return view('Admin.admin',compact('usuarios'));
    }

    /**
     * @throws Exception
     */
    public function destroy(DeleteUserRequest $request)
    {
        try{
            User::find($request->userId)->delete();

            return back()->with('mensaje','Usuario eliminado');
        }catch (Exception $e){
            Log::channel('admin')->error('Error al eliminar usuario');
            Log::channel('admin')->error($e->getMessage());
            Log::channel('admin')->error($e->getTraceAsString());

            return back()->with('error', 'Hubo un error al eliminar el usuario. Intente nuevamente');
        }

    }
    public function changePass()
    {
        return view('auth.passwords.reset');
    }
}
