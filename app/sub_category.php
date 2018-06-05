<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    //
    protected $table = 'sub_category';

    public function extra_sub_category(){
        return $this->hasMany('App\extra_sub_category','sub_category_id');
    }
    public function category(){
        return $this->belongsTo('App\category','category_id');
    }
}
