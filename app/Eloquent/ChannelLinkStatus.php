<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class ChannelLinkStatus extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'user_channel_link_status';
}
