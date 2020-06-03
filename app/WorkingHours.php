<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
