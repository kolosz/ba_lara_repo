<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Input;
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

    public function permissionDenied()
    {
        return view('denied');
    }

    // work starts here

    public function findAction()
    {
        if (Input::has('start_btn'))
        {
            
            return $this->dispatch(new \App\Jobs\WorkStart());
        }
        else if (Input::has('stop-btn'))
        {
            return $this->dispatch(new \App\Jobs\WorkStop());
        }
        else if (Input::has('pause-btn'))
        {
            return $this->dispatch(new \App\Jobs\WorkPause());
        }

        return 'no action found';
    }


}
