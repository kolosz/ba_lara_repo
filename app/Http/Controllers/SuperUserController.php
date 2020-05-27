<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('superuser');
    }

    public function index()
    {
        return view('manager');
    }
}
