<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyLessons extends Model
{

    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'academy_lessons';

    public function getLessonType()
    {

        switch($this->type)
        {
            case 0:
                return "Intro";
            break;
            case 1:
                return "Basics";
            break;
            case 2:
                return "Advanced";
            break;
        }
    }

    public function getCourse()
    {
        return $this->belongsTo(AcademyCourses::class, 'course_id', 'id');
    }

    public function getVideos()
    {
        return $this->hasMany(AcademyLessonVideo::class, 'lesson_id', 'id');
    }

}
