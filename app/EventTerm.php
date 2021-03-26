<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTerm extends Model
{
    protected $table = 'event_terms';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'up_id', 'title', 'sort',
    ];

    public function termChildren($query,$id)
    {
        return $query->where('up_id',$id);
    }
}
