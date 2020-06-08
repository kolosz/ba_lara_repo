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

    public function permissionDenied()
    {
        return view('denied');
    }

    // work starts here

    public function findAction()
    {
        if (isset($_POST['start_btn']))
        {
            try
            {
                return $this->dispatch(new \App\Jobs\WorkStart());
            }
            catch(\Exception $e)
            {
                echo "crap: ", $e->getMessage(), "\n";
            }
        }
        elseif  (isset($_POST['stop_btn']))
        {
            try
            {
                return $this->dispatch(new \App\Jobs\WorkStop());
            }
            catch(\Exception $e)
            {
                echo "crap: ", $e->getMessage(), "\n";
            }
        }
        elseif (isset($_POST['start_pause_btn']))
        {
            try
            {
                return $this->dispatch(new \App\Jobs\WorkStartPause());
            }
            catch(\Exception $e)
            {
                echo "crap: ", $e->getMessage(), "\n";
            }
        }
        elseif  (isset($_POST['end_pause_btn']))
        {
            try
            {
                return $this->dispatch(new \App\Jobs\WorkEndPause());
            }
            catch(\Exception $e)
            {
                echo "crap: ", $e->getMessage(), "\n";
            }
        }
        elseif (isset($_POST['calculate_btn']))
        {
            try
            {
                return $this->dispatch(new \App\Jobs\CalculateWorkingHours());
            }
            catch(\Exception $e)
            {
                echo "crap: ", $e->getMessage(), "\n";
            }
        }
    }


}
