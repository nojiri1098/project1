<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    const INCANDESCENT = 1;     // 白熱灯
    const LED          = 2;     // LED

    const EQUAL = 1;    // 赤：青＝１：１
    const RED   = 2;    // 赤：青＝３：１
    const BLUE  = 3;    // 赤：青＝１：３

    public function planter()
    {
        return $this->belongsTo('App\Planter');
    }
}
