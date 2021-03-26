<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermLink extends Model
{
    protected $table = 'term_links';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id','term_id'
    ];
    public $timestamps = false;


    public function Term(){
        return $this->belongsTo(EventTerm::class);
    }


}
