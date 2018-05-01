<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'user_collabs';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hasCollabedWith($user_id)
    {
        $collabs = CollaborationRequest::where(['user_id' => $this->getUser->id, 'requesting_user_id' => $user_id]);

        if($collabs->count())
            return $collabs->get();
        else
            return false;
    }

}
