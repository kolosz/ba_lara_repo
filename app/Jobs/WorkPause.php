<?php

namespace App\Jobs;

use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WorkPause implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // trigger an action on first and on second button click
        try
        {
            $id = DB::table('pauses')->insertGetId(
                ['user_id' => auth()->user()->id, 'start_pause' => now()]
            );
        }
        catch  (\Exception $e)
        {
            echo "crap", $e->getMessage(), "\n";
        }
    }
}
