<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FunMenuDetail extends Model
{
    protected $table = 'funmenudetail';

    public function getFunctions()
    {
        return $this->hasMany('App\Functions');
    }
}
