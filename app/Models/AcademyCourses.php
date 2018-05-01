<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyCourses extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'academy_courses';

    public function getLessons()
    {
        return $this->hasMany(AcademyLessons::class, 'course_id', 'id');
    }


    public function getLessonsByType($type = 0)
    {
        return AcademyLessons::where(['type' => $type, 'course_id' => $this->id])->get();
    }
}
