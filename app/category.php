<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'category';

    public function sub_category(){
        return $this->hasMany('App\sub_category','category_id');
    }
}
