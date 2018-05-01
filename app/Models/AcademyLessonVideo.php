<?php

namespace App\Models;

use Alaouy\Youtube\Facades\Youtube;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class AcademyLessonVideo extends Model
{

    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'academy_lessons_videos';

    public function getVideoData()
    {

        $info = Youtube::getVideoInfo($this->video_id);

        return $info;


    }

    private function covtime($youtube_time)
    {
        $start = new DateTime('@0');
        $start->add(new DateInterval($youtube_time));
        return $start->format('H:i:s');
    }

}
