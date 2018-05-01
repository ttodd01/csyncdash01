<?php

namespace App\Models\Ranking;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ranks extends Model
{
    public $timestamps = true;
    protected $table = 'user_ranks';

    protected $guarded = ['id'];


    public function usersOfRank()
    {
        return $this->hasMany(User::class, 'rank', 'id');
    }



}
