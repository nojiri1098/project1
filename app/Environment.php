<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    const FINE   = 1;
    const CLOUDY = 2;
    const RAIN   = 3;
    const SNOW   = 4;

    public static $weatherTypeLabels = [
        1 => 'Fine',
        2 => 'Cloud',
        3 => 'Rain',
        4 => 'Snow',
    ];

    public function soils()
    {
        return $this->hasMany('App\Soil');
    }
}
