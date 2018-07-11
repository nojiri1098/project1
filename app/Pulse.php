<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulse extends Model
{
    public function planter()
    {
        return $this->belongsTo('App\Planter');
    }
}
