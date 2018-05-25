<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soil extends Model
{
    public function planter()
    {
        return $this->belongsTo('App\Planter', 'planter_id');
    }

    public function environment()
    {
        return $this->belongsTo('App\Environment', 'environment_id');
    }
}
