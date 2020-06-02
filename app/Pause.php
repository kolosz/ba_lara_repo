<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pause extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
