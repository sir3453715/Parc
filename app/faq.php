<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class faq extends Model
{
    //
    protected $table = "faq";
    protected $guarded = [];

    public function lang(){
        $name= DB::table('lang')->where('id',$this->lang)->value('name');
        return $name;
    }
}
