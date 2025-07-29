<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('all-sliders');
        $sliders = Slider::latest('id')->paginate(6);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'btn1_link' => 'required'
        ]);

        $sliderimage = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $sliderimage);


        Slider::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $sliderimage,
            'btn1_link' => $request->btn1_link
        ]);
        return redirect()
        ->route('admin.sliders.index')
        ->with('msg',__('admin.slider added successfully'))
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $slider = Slider::findOrFail($id);

        return view('admin.sliders.view', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'btn1_link' => 'required'
        ]);

        $slider = Slider::findOrFail($id);

        $sliderimage = $slider->image;

        if($request->hasFile('image')) {

            $sliderimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $sliderimage);

        }


        $slider->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $sliderimage,
            'btn1_link' => $request->btn1_link
        ]);


        return redirect()
        ->route('admin.sliders.index')
        ->with('msg',__('admin.Slider updated successfully'))
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slider::destroy($id);

        return redirect()
        ->route('admin.sliders.index')
        ->with('msg',__('admin.Slider deleted successfully'))
        ->with('type', 'success');
    }
}
