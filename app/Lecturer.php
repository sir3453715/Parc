<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lecturer extends Model
{
    // specify the table name... cuz laravel will add 's' 
    protected $table = "lecturer";
    protected $guarded = [];
    public function lang(){
        $name= DB::table('lang')->where('id',$this->lang)->value('name');
        return $name;
    }
}
