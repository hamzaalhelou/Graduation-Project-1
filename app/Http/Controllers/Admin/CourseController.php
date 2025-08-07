<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Notifications\CourseNotification;
use Illuminate\Support\Facades\Notification;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('all-courses');
        $courses = Course::latest('id')->paginate(6);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::select('name', 'id')->get();

        return view('admin.courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'category' => 'required',
            'field' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'duration_hours' => 'required',
            'duration_month' => 'required',
            'content' => 'required',
            'teacher_id' => 'required',
        ]);

        if($request->image){


            $courseimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $courseimage);
        }


        $course=   Course::create([
            'date' => $request->date,
            'title' => $request->title,
            'category' => $request->category,
            'field' => $request->field,
            'price' => $request->price,
            'duration' => $request->duration,
            'duration_hours'=>$request->duration_hours,
            'duration_month'=>$request->duration_month,
            'content' => $request->content,
            'teacher_id' => $request->teacher_id,
            'image' => $courseimage
        ]);



        return redirect()
        ->route('admin.courses.index')
        ->with('msg', __('admin.Course added successfully'))
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teachers = Teacher::select('name', 'id')->get();
        $course = Course::findOrFail($id);

        return view('admin.courses.view', compact('teachers', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers = Teacher::select('name', 'id')->get();
        $course = Course::findOrFail($id);

        return view('admin.courses.edit', compact('teachers', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'category' => 'required',
            'field' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'duration_hours' => 'required',
            'duration_month' => 'required',
            'content' => 'required',
            'teacher_id' => 'required'
        ]);

        $course = Course::findOrFail($id);

        $courseimage = $course->image;
        if($request->hasFile('image')) {

            $courseimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $courseimage);
        }


        $course->update([
            'date' => $request->date,
            'title' => $request->title,
            'category' => $request->category,
            'field' => $request->field,
            'price' => $request->price,
            'duration' => $request->duration,
            'duration_hours'=>$request->duration_hours,
            'duration_month'=>$request->duration_month,
            'content' => $request->content,
            'teacher_id' => $request->teacher_id,
            'image' => $courseimage
        ]);

        $user = User::get();
        $course= Course::latest()->first();
        Notification::send($user, new CourseNotification($course));


        return redirect()
        ->route('admin.courses.index')
        ->with('msg', __('admin.Course updated successfully'))
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);

        return redirect()
        ->route('admin.courses.index')
        ->with('msg',__('admin.course deleted successfully'))
        ->with('type', 'success');
    }
}
