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
        try {
            // get all rows where user_id === current user
            $userTimes = DB::table('times')->insertGetId(
                ['user_id' => auth()->user()->id]
            );

            echo $userTimes;
        }
        catch  (\Exception $e)
        {
            echo $e;
        }

        // sort them by date ->today() ?
        // sort them by time

        // if oldest is start -> set end to now() ->calculate

        // if oldest is stop -> calculate

        // after that do the same thing with pause

        // work hour - pause === working hours

    }
}
