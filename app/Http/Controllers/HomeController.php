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

    public function findAction(\Illuminate\Http\Request $request)
    {
        if ($request->has('start-btn'))
        {
            return $this->dispatch(new \App\Jobs\WorkStart($request));
        }
        else if ($request->has('stop-btn'))
        {
            return $this->dispatch(new \App\Jobs\WorkStop($request));
        }
        else if ($request->has('pause-btn'))
        {
            return $this->dispatch(new \App\Jobs\WorkStop($request));
        }

        return 'no action found';
    }


}
