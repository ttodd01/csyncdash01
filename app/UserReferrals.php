<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class UserReferrals extends Model
{
    public $timestamps = true;
    protected $table = 'user_referrals';
    protected $guarded = ['id'];
    public function referredUser()
    {
        return $this->hasOne(User::class, 'id', 'referred_user_id');
    }
    public function referredByUser()
    {
        return $this->hasOne(User::class, 'id', 'referred_by_user_id');
    }
}