<?php

namespace App\Jobs;

use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WorkStart implements ShouldQueue
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
            $id = DB::table('times')->insertGetId(
                ['user_id' => auth()->user()->id, 'clocked_in' => now(), 'type'=>"work", 'created_at' => now(), 'updated_at' => now()]
            );

            echo $id;
        }
        catch(\Exception $e)
        {
            echo "crap", $e->getMessage(), "\n";
        }
    }
}
