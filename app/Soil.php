<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soil extends Model
{
    public function planter()
    {
        return $this->belongsTo('App\Models\Planter');
    }

    public function environment()
    {
        return $this->belongsTo('App\Models\Environment');
    }
}
