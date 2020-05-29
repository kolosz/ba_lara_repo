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
                $id = DB::table('times')->insertGetId(
                    ['user_id' => 1, 'clocked_in' => now()]
                );
            }
            catch(Exception $e)
            {
                echo "crap: ", $e->getMessage(), "\n";
            }
        }
        elseif  (isset($_POST['stop_btn']))
        {
            try
            {
                $id = DB::table('times')->insertGetId(
                    ['user_id' => 1, 'clocked_out' => now()]
                );
            }
            catch(Exception $e)
            {
                echo "crap: ", $e->getMessage(), "\n";
            }
        }
        elseif (isset($_POST['pause_btn']))
        {
            // do stuff
        }
        /*
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
*/
        return 'no action found';
    }


}
