<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CollaborationRequest extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'collabs_requests';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getRequestingUser()
    {
        return $this->belongsTo(User::class, 'requesting_user_id', 'id');
    }

}
