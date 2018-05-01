<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ChanelReviewRequest extends Model
{

    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'channel_reviews';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getChannel()
    {
        return $this->belongsTo(YouTubeChannel::class, 'channel_id', 'id');
    }

    public function getReviewStatus()
    {

        switch($this->status)
        {
            case 0:
                return "Awaiting Review";
            break;
            case 1:
                return "Review Complete";
            break;
        }

    }

}
