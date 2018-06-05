<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MileStone extends Model
{
    //
    protected $table = "milestone";
    protected $guarded = [];

    public function lang(){
        $name= DB::table('lang')->where('id',$this->lang)->value('name');
        return $name;
    }
}
