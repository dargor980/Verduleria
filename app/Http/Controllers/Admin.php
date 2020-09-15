<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        /*$ usuarios= Users::all(); */
        return view('Admin.admin');
    }
}
