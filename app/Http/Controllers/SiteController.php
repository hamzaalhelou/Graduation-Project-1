<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\Feature;
use App\Models\Journalist;
use App\Models\Research;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest('id')->get();
        $sliderse = Slider::latest('id')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->take(3)->get();
        $events = Event::orderBy('created_at', 'desc')->take(3)->get();
        $features = Feature::latest('id')->get();
        $latestItems = Course::orderBy('created_at', 'desc')->take(6)->get();
        $journalists = Journalist::orderBy('created_at', 'desc')->take(3)->get();
        return view('site.index',compact('sliders','teachers','events','latestItems','journalists','features','sliderse'));
    }
    public function about()
    {
        $user =  User::count();
        $course =  Course::count();
        $teacher =  Teacher::count();
        $event =  Event::count();
        $teachers = Teacher::orderBy('created_at', 'desc')->take(3)->get();
        return view('site.about',compact('teachers','user','course','teacher','event'));
    }

    public function courses()
    {
        $courses = Course::latest('id')->get();
        return view('site.courses',compact('courses'));
    }

    public function events()
    {
        $events = Event::latest('id')->get();
        return view('site.events',compact('events'));
    }

    public function blog()
    {
        $journalists = Journalist::latest('id')->get();
        return view('site.blog',compact('journalists'));
    }

    public function contact()
    {
       return view('site.contact');
    }

    public function research()
    {
        $researchs = Research::latest('id')->get();
        return view('site.research',compact('researchs'));
    }


    public function teacher()
    {
        $teachers = Teacher::latest('id')->get();
        return view('site.teacher',compact('teachers'));
    }

    public function notice()
    {
       return view('site.notice');
    }

    public function scholarship()
    {
        return view('site.scholarship');
    }

    public function course_single($id)
    {
        $course = Course::findOrFail($id);
        $courses = Course::orderBy('created_at', 'ASC')->take(3)->get();
        return view('site.course-single',compact('course','courses'));
    }











}
