<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Youtube;
use App\Models\AcademyCourses;
use App\Models\AcademyLessons;
use Illuminate\Http\Request;

use App\Http\Requests;

class AcademyController extends Controller
{
    public function viewAcademy()
    {
        
        return view('academy.viewall', [
            'courses' => AcademyCourses::all()
        ]);
        
    }

    public function viewAcademyCourse($id = null)
    {

        if($id == null)
            return \Redirect::to('/academy/');

        $course = AcademyCourses::find($id);

        $lessonLengthArray = [];

        if($course->getLessons()->count())
        {
            $none = 0;
            $intro = 0;
            $basic = 0;
            $advanced = 0;

            $total = 0;

            foreach ($course->getLessons as $lesson) {

                if($lesson->type == 0)
                {
                    $none += $lesson->length_in_minutes;
                }
                else if($lesson->type == 1)
                {
                    $intro += $lesson->length_in_minutes;
                }
                else if($lesson->type == 2)
                {
                    $basic += $lesson->length_in_minutes;
                }
                else if($lesson->type == 3)
                {
                    $advanced += $lesson->length_in_minutes;
                }
                $total += $lesson->length_in_minutes;
            }

            $lessonLengthArray = [
                'none' => $none,
                'intro' => $intro,
                'basic' => $basic,
                'advanced' => $advanced,
                'total' => $total
            ];

        }


        return view('academy.list-courses', [
            'course' => $course,
            'lengths' => (object)$lessonLengthArray
        ]);
    }

    public function viewAcademyCourseLesson($id = null, $lesson_id = null)
    {

        if($id == null || $lesson_id == null)
            return \Redirect::to('/academy/');


        $youtube = new Youtube(config('youtube.KEY'));

        return view('academy.view-lesson', [
            'course' => AcademyCourses::find($id),
            'lesson' => AcademyLessons::find($lesson_id),
            'youtube' => $youtube
        ]);

    }
}
