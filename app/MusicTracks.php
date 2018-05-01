<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicTracks extends Model
{
    public $timestamps = true;
    protected $table = 'music_tracks';
    protected $guarded = ['id'];
}
