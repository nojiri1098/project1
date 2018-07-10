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

    public function getSoilLevelAttribute()
    {
        switch ($this->water) {
            case 1:
                return '<span class="badge badge-danger">低い</span>';
            case 2:
                return '<span class="badge badge-success">正常</span>';
            case 3:
                return '<span class="badge badge-warning">高い</span>';
            default:

        }
    }
}
