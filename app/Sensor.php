<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DB;

class Sensor extends Model
{
    public function planter()
    {
        return $this->belongsTo('App\Planter');
    }
}
