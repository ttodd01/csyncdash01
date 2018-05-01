<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    public $timestamps = true;
    protected $table = 'apps';

    protected $guarded = ['id'];


    public static function getAllTags($type)
    {
        $allTags = [];

        foreach(App::all() as $app)
        {
            $tag = $app->tag;
            if(str_contains($tag, " "))
                $tag = str_replace(" ", "_", $tag);

            if($app->type == $type && !in_array($tag, $allTags))
            {
                $allTags[] = $tag;
            }
        }
        //dd($allTags);

        return $allTags;
    }
}
