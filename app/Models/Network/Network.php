<?php

namespace App\Models\Network;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    public $timestamps = true;
    protected $table = 'user_network';

    protected $guarded = ['id'];

    public function getOwner()
    {
        if(User::where('id', $this->user_id)->count())
            return User::find($this->user_id);
        else
            return false;
    }

}
