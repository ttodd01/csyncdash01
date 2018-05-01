<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Youtube;
use App\Models\AcademyCourses;
use App\Models\AcademyLessons;
use App\Models\AcademyLessonVideo;
use App\Models\ChanelReviewRequest;
use App\Models\Gear;
use App\Models\GearCategories;
use App\Models\GraphicsRequests;
use App\Models\Ranking\Ranks;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;

class AdminController extends Controller
{


    public function __construct()
    {

    }


    public function getCreateUser()
    {
        return view('admin.create-account');
    }
    public function postCreateUser(Requests\AdminUserCreationRequest $request)
    {

        $is_admin = 0;
        if($request->has('is_admin'))
            $is_admin = 1;

        $rank = Ranks::find(1);
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'is_admin' => $is_admin,
            'rank_id' => 1
        ]);
        $user->getRank()->associate($rank);
        $user->save();


        return \Redirect::back();

    }
    public function postDeleteUser($user_id)
    {

        if(\Auth::user()->is_admin == 1)
        {
            User::destroy($user_id);
            return "complete";
        }
        else
            return "get rights.";


    }

    public function getRegisteredUsers()
    {
        return view('admin.view-registered-users', [
            'users' => User::paginate(10)
        ]);
    }
    public function postRegisteredUsers()
    {

        if(Input::has('edit_user'))
        {

            $selectedUser = User::find(Input::get('edit_user'));
            $selectedUser->name = Input::get('name');
            $selectedUser->email = Input::get('email');
            $selectedUser->is_admin = Input::get('is_admin');
            $selectedUser->push();

            return back()->with('success', 'You have updated '.$selectedUser->name);

        }

    }

    public function getGraphicsRequests()
    {
        return view('admin.requests.graphics', [
            'pending_requests' => GraphicsRequests::where('status', 0)->orWhere('status', 1)->get(),
            'requests' => GraphicsRequests::all()
        ]);
    }
    public function postGraphicsRequests()
    {




    }

    public function setGraphicsRequestStatus($id, $status)
    {

        $request = GraphicsRequests::find($id);

        $request->status = $status;

        $request->save();

        return "The status has been changed too ".$request->getStatus();

    }

    public function getChannelReview()
    {
        return view('admin.requests.reviews', [
            'reviews' => ChanelReviewRequest::where('status', 0)->get(),
            'completed' => ChanelReviewRequest::where('status', 1)->get()
        ]);
    }
    public function postChannelReview()
    {
        if(Input::has('complete_review'))
        {
            $channelReview = ChanelReviewRequest::find(Input::get('complete_review'));

            $channelReview->doc_url = Input::get('doc_url');
            $channelReview->status = 1;
            $channelReview->save();

            return back()->with('showSuccessNotification', 'You have updated '. $channelReview->getUser->name.'\'s channel review to complete!');
        }
    }
    public function getCreatorAcademy()
    {
        return view('admin.academy.manage-courses', [

        ]);
    }
    public function getCreatorAcademyVideos()
    {

        $youtube = new Youtube(config('youtube.KEY'));




        return view('admin.academy.manage-lesson-videos', [
            'youtube' => $youtube

        ]);
    }
    public function postCreatorAcademyVideos()
    {
        if(Input::has('add_video'))
        {

            if(empty(Input::get('video_id')))
                return back()->with('showErrorNotification', 'You didn\'t add a video id!');

            AcademyLessonVideo::create([
                'video_id' => Input::get('video_id'),
                'lesson_id' => Input::get('lesson_id')
            ]);
            return back()->with('showSuccessNotification', 'Video added to lesson');
        }

        if(Input::has('select_lesson_for_videos'))
        {
            $lesson = AcademyLessons::find(Input::get('lesson_id'));
            Session::flash('edit', $lesson);
            return back()->with('showSuccessNotification', 'You are now editing lesson '.$lesson->title);
        }
        if(Input::has('delete_video'))
        {
            AcademyLessonVideo::destroy(Input::get('delete_video'));

            return back()->with('showSuccessNotification', 'You successfully deleted the video!');
        }
    }
    public function postCreatorAcademy()
    {


        if(Input::has('select_course'))
        {
            $course = AcademyCourses::find(Input::get('course'));

            return back()->with('course', $course);

        }
        if(Input::has('select_lesson'))
        {
            $lesson = AcademyLessons::find(Input::get('lesson'));

            return back()->with('lesson', $lesson);

        }
        if(Input::has('edit_course'))
        {

            $course = AcademyCourses::find(Input::get('edit_course'));
            $course->title = Input::get('title');
            $course->description = Input::get('description');
            $course->image_url= Input::get('image_url');
            $course->save();

            return back()->with('success', 'Your course was edited!');

        }
        if(Input::has('edit_lesson'))
        {

            $course = AcademyLessons::find(Input::get('edit_lesson'));
            $course->course_id = Input::get('course_id');
            $course->title = Input::get('title');
            $course->course_text = Input::get('course_text');
            $course->type = Input::get('type');
            $course->length_in_minutes = Input::get('length_in_minutes');
            $course->save();

            return back()->with('success', 'Your lesson was edited!');

        }
        if(Input::has('create_course'))
        {

            AcademyCourses::create([
                'title' => Input::get('title'),
                'description' => Input::get('description'),
            ]);

            return back()->with('success', 'Your course was added to the academy!');

        }
        if(Input::has('create_lesson'))
        {

            AcademyLessons::create(Input::except('create_lesson'));

            return back()->with('success', 'Your lesson was added to the academy course!');

        }

    }

    public function getManageGear()
    {
        $categories = GearCategories::all();
        if(Input::has('get_categories'))
        {
            return view('partials.admin.gear-cat', ['categories' => $categories]);
        }

        return view('admin.manage-gear', [
            'categories' => $categories
        ]);
    }
    public function postManageGear()
    {

        if(Input::has('delete_product'))
        {
            Gear::destroy(Input::get('delete_product'));
            return back()->with(['showSuccessNotification' => 'The product was deleted!']);
        }
        if(Input::has('edit_gear_item'))
        {
            Gear::find(Input::get('edit_gear_item'))->update(Input::except('edit_gear_item'));

            return back()->with('showSuccessNotification', 'Your gear item was successfully saved!');
        }
        if(Input::has('select_gear_item'))
        {
            return back()->with(['edit_gear_item' => 1, 'gear_item' => Gear::find(Input::get('gear_item_select'))]);
        }
        if(Input::has('create_gear_item'))
        {
            Gear::create(Input::except('create_gear_item'));
            return back()->with('showSuccessNotification', 'Your gear item was added!');
        }
        if(Input::has('category_id'))
        {
            GearCategories::destroy(Input::get('category_id'));
            return "The category was deleted!";
        }
        if(Input::has('add_category'))
        {
            GearCategories::create([
                'name' => Input::get('category_text')
            ]);
            return "New category created!";
        }

    }


}