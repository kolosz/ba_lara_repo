<?php

namespace App\Jobs;

use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateWorkingHours implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // sort them by time
        $today = today();

        //echo $today;

        $userTimes = DB::table('times')
            ->where('user_id', auth()->user()->id )
            ->whereDate('clocked_in', '>', $today)
            ->orderBy('clocked_in', 'desc')
            ->get();

        // query von laravel

        echo $userTimes;

        // if oldest is start -> set end to now() ->calculate

        // if oldest is stop -> calculate

        // after that do the same thing with pause

        // work hour - pause === working hours

        // save working hours in table

    }
}
