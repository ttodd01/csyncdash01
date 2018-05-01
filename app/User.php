<?php

namespace App;

use App\Models\ChanelReviewRequest;
use App\Models\GraphicsRequests;
use App\Models\Network\Network;
use App\Models\Ranking\Ranks;
use App\Models\YouTubeChannel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = ['id'];

    public $timestamps = true;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPicture()
    {
        if($this->hasNetwork())
        {
            if($this->getNetwork()->logo_url != "")
                return $this->getNetwork()->logo_url;
        } else {



        }

    }

    public function getHeadNetwork()
    {
        $hn = Network::find($this->head_network);
        if($hn)
        {
            return $hn;
        }

        return false;
    }

    /**
     * Get the users dashboard rank
     * Returns the ranking object
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getRank()
    {
        return Ranks::find($this->rank);
    }

    /**
     * Sets the users rank
     *
     * @param $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
        $this->save();
    }

    /**
     * Checks if the user has a specific rank, returning true or false
     *
     * @param $rank
     * @param string $type
     * @return bool
     */
    public function hasRank($rank, $type = "int")
    {
        $rankFind = Ranks::find($rank);
        switch($type)
        {
            case "slug":
                $rankFind = Ranks::where('slug', $rank)->get();
                break;
            case "name":
                $rankFind = Ranks::where('name', $rank)->get();
                break;
        }
        if($rankFind->count())
        {
            if($this->rank == $rankFind->id)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Binds specific ranks into a "group" of such.
     * "Standard, Vip and Master Networks" can be referenced as all 3 ranks by one param.
     *
     * @param $rank
     * @return bool
     */

    public function hasChannelLinked()
    {
        if(YouTubeChannel::where('user_id', $this->id)->count())
        {
            return true;
        }
        return false;
    }
    public function youtubeChannels()
    {
        return $this->hasMany(YouTubeChannel::class, 'user_id', 'id');
    }

    public function hasRankGroup($rank)
    {
        $currentUserRank = Ranks::find($this->rank);
        $rankFind = null;
        switch($rank)
        {
            case "network":
                if($currentUserRank->slug == 'standard-network' ||
                    $currentUserRank->slug == 'vip-network' ||
                    $currentUserRank->slug == 'master-network' ||
                    $currentUserRank->slug == 'admin')
                    return true;
                break;
        }
        return false;
    }

    /**
     * Checks if the user owns a network
     *
     * @return bool
     */
    public function hasNetwork()
    {
        if(Network::where('user_id', $this->id)->count())
            return true;

        return false;
    }
    public function getHeadCompany()
    {
        return $this->hasOne(Network::class, 'id', 'head_network');
    }
    /**
     * Gets the users network if they own one.
     *
     * @return bool
     */
    public function getNetwork()
    {
        if($this->hasNetwork())
        {
            return Network::where('user_id', $this->id)->first();
        }
        return false;
    }

    public function getGraphicsRequests()
    {
        return $this->hasMany(GraphicsRequests::class, 'user_id', 'id');
    }

    public function getReviewRequests()
    {
        return $this->hasMany(ChanelReviewRequest::class, 'user_id', 'id');
    }
    public function getAvatar()
    {
        return "http://www.gravatar.com/avatar/". md5($this->email).'?d=mm';
    }
    public function channelEarnings()
    {
        return $this->hasMany(ChannelEarnings::class, 'user_id', 'id');
    }
}
