<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class extra_sub_category extends Model
{
    //
    protected $table = 'extra_sub_category';

    public function sub_category(){
        return $this->belongsTo('App\sub_category','sub_category_id');
    }
}
