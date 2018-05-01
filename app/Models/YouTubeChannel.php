<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class YouTubeChannel extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'youtube_channels';

    public function getUser(){
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}
