<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class article extends Model
{
    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function tagsname(){
        $tags=$this->tags()->pluck('name')->toArray();
        $tagsname=implode(",",$tags);
        return $tagsname;
    }
    public function lang(){
        $name= DB::table('lang')->where('id',$this->lang)->value('name');
        return $name;
    }
    // Get category_name
    public function category(){
        $name= DB::table('category')->where('id',$this->category)->value('name');
        return $name;
    }
    public function sub_category(){
        $name= DB::table('sub_category')->where('id',$this->sub_category)->value('name');
        return $name;
    }
    public function extra_sub_category(){
        $name= DB::table('extra_sub_category')->where('id',$this->extra_sub_category)->value('name');
        return $name;
    }
    public function category_en(){
        $name= DB::table('category')->where('id',$this->category)->value('en_name');
        return $name;
    }
    public function sub_category_en(){
        $name= DB::table('sub_category')->where('id',$this->sub_category)->value('en_name');
        return $name;
    }
    public function extra_sub_category_en(){
        $name= DB::table('extra_sub_category')->where('id',$this->extra_sub_category)->value('en_name');
        return $name;
    }
    // Get User_name
    public function user(){
        $name= DB::table('users')->where('id',$this->user_id)->value('name');
        return $name;
    }
}
