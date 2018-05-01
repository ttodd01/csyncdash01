<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelEarnings extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'user_payments';

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
