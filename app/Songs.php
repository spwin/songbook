<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'sample', 'chords', 'words'
    ];

    public function tags(){
        return $this->belongsToMany('App\Tags', 'songs_tags', 'song_id', 'tag_id');
    }
}
