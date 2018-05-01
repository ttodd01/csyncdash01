<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Network{
/**
 * App\Models\Network\Network
 *
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property string $slogan
 * @property string $logo_url
 * @property string $background_image_url
 * @property integer $head_network
 * @property boolean $sub_network
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $color_scheme
 * @property string $network_bio
 * @property string $twitter
 * @property string $facebook
 * @property string $youtube
 * @property string $instagram
 * @property string $linkedin
 */
	class Network {}
}

namespace App\Models\Ranking{
/**
 * App\Models\Ranking\Ranks
 *
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $usersOfRank
 */
	class Ranks {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $full_name
 * @property string $paypal_email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $rank
 * @property integer $head_network
 */
	class User {}
}

