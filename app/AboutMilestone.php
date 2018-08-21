<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AboutMilestone extends Model
{
    //
    protected $guarded = [];

    public function lang(){
        $name= DB::table('lang')->where('id',$this->lang)->value('name');
        return $name;
    }
    public function getDates()
    {
        //define the datetime table column names as below in an array, and you will get the
        //carbon objects for these fields in model objects.
        return array('created_at', 'updated_at', 'date');
    }
}
