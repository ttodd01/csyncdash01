<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class GraphicsRequests extends Model
{

    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'graphics_requests';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getRequestType()
    {
        switch($this->type)
        {
            case 1:
                return "Banner";
            break;
            case 2:
                return "Video Thumbnail";
            break;
            case 3:
                return "Avatar";
            break;
            default:
                return "Banner";
        }
    }
    public function getStatus()
    {
        switch($this->status)
        {
            case 0:
                return "Pending";
            break;
            case 1:
                return "Being Worked On";
            break;
            case 2:
                return "Complete, check your email/skype!";
            break;
        }
    }

}
