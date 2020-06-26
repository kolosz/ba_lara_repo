<?php

namespace App\Jobs;

use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WorkStop implements ShouldQueue
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
        try
        {
            $stopTime = DB::table('times')
                ->where('user_id', auth()->user()->id)
                ->where('clocked_out', null)
                ->where('type', 'work')
                ->update(
                    ['clocked_out' => now(), 'updated_at' => now()]
                );
        }
        catch(\Exception $e)
        {
            echo "crap", $e->getMessage(), "\n";
        }
    }
}
