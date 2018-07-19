<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class indexKV extends Model
{
    //
    protected $guarded = [];
    protected $table='index_kv';

    public function lang(){
        $name= DB::table('lang')->where('id',$this->lang)->value('name');
        return $name;
    }
}
