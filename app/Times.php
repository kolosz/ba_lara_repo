<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    public function endWork()
    {
        $this->end_of_work = true;
        $this->save();
    }

    // need a function to start work

    // need a function to take a break

    // need a function to end work and calculate +/- hours

    // trying to get a connection between user and times
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
