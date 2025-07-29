<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('all-teachers');
        $teachers = Teacher::latest('id')->paginate(6);
        return view('admin.teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'position'=>'required',
            'fb_link'=>'required',
            'gm_link'=>'required',
            'in_link'=>'required',
            'ln_link'=>'required'
        ]);

        $teacherimage = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $teacherimage);


        Teacher::create([
            'name' => $request->name,
            'image' => $teacherimage,
            'position' => $request->position,
            'fb_link' => $request->fb_link,
            'gm_link' => $request->gm_link,
            'in_link' => $request->in_link,
            'ln_link' => $request->ln_link
        ]);



        return redirect()
        ->route('admin.teacher.index')
        ->with('msg',__('admin.teachers added successfully'))
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.view', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'position'=>'required',
            'fb_link'=>'required',
            'gm_link'=>'required',
            'in_link'=>'required',
            'ln_link'=>'required'
        ]);

        $teachers = Teacher::findOrFail($id);

        $teacherimage = $teachers->image;

        if($request->hasFile('image')) {

            $teacherimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $teacherimage);

        }


        $teachers->update([
            'name' => $request->name,
            'image' => $teacherimage,
            'position' => $request->position,
            'fb_link' => $request->fb_link,
            'gm_link' => $request->gm_link,
            'in_link' => $request->in_link,
            'ln_link' => $request->ln_link

        ]);


        return redirect()
        ->route('admin.teacher.index')
        ->with('msg',__('admin.teacher updated successfully'))
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Teacher::destroy($id);

        return redirect()
        ->route('admin.teacher.index')
        ->with('msg',__('admin.teacher deleted successfully'))
        ->with('type', 'success');
    }
}
