<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planter extends Model
{
    const Planter1 = 1;     // 白熱灯
    const Planter2 = 2;     // LED 1:1
    const Planter3 = 3;     // LED 赤多い
    const Planter4 = 4;     // LED 青多い

    public function sencors()
    {
        return $this->hasMany('App\Sencor');
    }

    public function lights()
    {
        return $this->hasMany('App\Light');
    }

    public function soils()
    {
        return $this->hasMany('App\Soil');
    }
}
