<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class LoveEvent extends Model
{
    protected $table = 'love_events';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active', 'title', 'description', 'author', 'body', 'tags', 'pic', 'user_id', 'lang', 'sort',
    ];

    public function EventTermsIDs(){

        $term_array = array();
        $TermLinks = TermLink::where('event_id',$this->id)->get();
        foreach ($TermLinks as $termLink){
            $term_array[]=$termLink->Term->id;
        }

        return $term_array;
    }

    public function EventTermsTitle(){

            $title = '';
            $TermLinks = TermLink::where('event_id',$this->id)->get();
            foreach ($TermLinks as $termLink){
                $title .= $termLink->Term->title.'<br/>';
            }

            return $title;
    }

}
