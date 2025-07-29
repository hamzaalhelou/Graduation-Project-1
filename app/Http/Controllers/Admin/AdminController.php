<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Event;
use App\Models\Feature;
use App\Models\Journalist;
use App\Models\Research;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Rawilk\Settings\Facades\Settings;

class AdminController extends Controller
{
    public function index() {
        $user =  User::count();
        $users =  User::count();
        $course =  Course::count();
        $teacher =  Teacher::count();
        $event =  Event::count();
        $research= Research::count();
        $journalist = Journalist::count();
        $feature = Feature::count();
        return view('admin.index',compact('user','course','teacher','event','research','journalist','feature','users'));

    }
     public function profile()
    {
        return view('admin.profile');
    }
    public function update(Request $request)
    {
    $user = Auth::user();

    $request->validate([
        'name' =>
            'required',
            'name',
            Rule::unique('users', 'name')->ignore($user->id),
        'email' =>
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($user->id),
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('admin.profile')->with('success',__('admin.Profile data has been updated successfully'));
    }



}
