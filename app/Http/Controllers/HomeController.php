<?php

namespace App\Http\Controllers;

use DB;
use App\Home;
use App\Times;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // work starts here

    public function startWork()
    {
        $conn = DB::table('times');
        $query = "INSERT INTO times (user_id, clocked_in) VALUES ({{ auth()->user()->id }}, CURRENT_TIMESTAMP())";
        $conn->query($query);
    }

    public function endWork()
    {
        // problem is that 2 seperate rows are going to be created; need to connect them somehow

        $conn = DB::table('times');
        $query = "INSERT INTO times (clocked_out) VALUES (CURRENT_TIMESTAMP())";
        $conn->query($query);
    }
}
