<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function songs(){
        return $this->belongsToMany('App\Songs', 'songs_tags', 'tag_id', 'song_id');
    }
}
