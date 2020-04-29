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
        try
        {
            $id = DB::table('times')->insertGetId(
                ['user_id' => 1, 'clocked_in' => now()]
            );
        }
        catch(Exception $e)
        {
            echo "bullshit";
        }
    }

    public function endWork()
    {
        try
        {
            $id = DB::table('times')->insertGetId(
                ['user_id' => 1, 'clocked_out' => now()]
            );
        }
        catch(Exception $e)
        {
            echo "bullshit";
        }
    }
}
