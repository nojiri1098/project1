<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulse extends Model
{
    public function planter()
    {
        return $this->belongsTo('App\Planter');
    }

    public function getDirectPowerAttribute()
    {
        return $this->time;

    }

    public function getPulsePowerAttribute()
    {
        return $this->time;
    }
}
