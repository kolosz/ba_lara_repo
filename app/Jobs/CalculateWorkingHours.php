<?php

namespace App\Jobs;

use DateTime;
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
        $difference_in_seconds = 0;

        $userTimes = DB::table('times')
            ->where('user_id', auth()->user()->id )
            ->where('created_at', '>', $today)
            ->where('type', "work")
            ->get();

        $userPauses = DB::table('times')
            ->where('user_id', auth()->user()->id)
            ->where('created_at', '>', $today)
            ->where('type', "pause")
            ->get();

        $arr = json_decode($userTimes, true);

        foreach ($arr as $row)
        {
            if ($row["type"] === "work")
            {
                /*
                $datetime1 = new DateTime($row['clocked_in']);
                $datetime2 = new DateTime($row['clocked_out']);

                $interval = $datetime1->diff($datetime2);
                */

                $difference_in_seconds = strtotime($row['clocked_out']) - strtotime($row['clocked_in']) . "\n";

                echo $difference_in_seconds;
            }
            elseif ($row["type"] === "pause")
            {
               // echo $difference_in_seconds -= strtotime($row['clocked_out']) - strtotime($row['clocked_in']) . "\n";
                echo "pause";
            }
        }

        /*
        $workTime = DB::table('working_hours')->insertGetId(
            ['user_id' => auth()->user()->id, 'working_hours' => $difference_in_seconds, 'created_at' => now(), 'updated_at' => now()]
        );

        echo $workTime;
        */

        // if oldest is start -> set end to now() ->calculate
    }
}
