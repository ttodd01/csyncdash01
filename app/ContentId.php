<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ContentId extends Model
{
    public $timestamps = true;
    protected $table = 'content_id';
    protected $guarded = ['id'];

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
