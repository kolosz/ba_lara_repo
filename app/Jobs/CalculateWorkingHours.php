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

        $today = today();
        //echo $today;

        $userTimes = DB::table('times')
            ->where('user_id', auth()->user()->id )
            ->where('created_at', '>', $today)
            ->where('type', "work")
            ->get();

        echo $userTimes;

        // if oldest is start -> set end to now() ->calculate

        // work hour - pause === working hours

        // save working hours in table

    }
}
