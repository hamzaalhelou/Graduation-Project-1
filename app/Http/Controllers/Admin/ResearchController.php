<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('all-researchs');
        $researchs = Research::latest('id')->paginate(6);
        return view('admin.research.index',compact('researchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.research.create');
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
        ]);

        $researchimage = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $researchimage);


        Research::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $researchimage,
        ]);
        return redirect()
        ->route('admin.research.index')
        ->with('msg',__('admin.research added successfully'))
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $researchs = Research::findOrFail($id);

        return view('admin.research.view', compact('researchs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $researchs = Research::findOrFail($id);

        return view('admin.research.edit', compact('researchs'));
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
        ]);

        $researchs = Research::findOrFail($id);

        $researchimage = $researchs->image;

        if($request->hasFile('image')) {

            $researchimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $researchimage);

        }


        $researchs->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $researchimage,
        ]);


        return redirect()
        ->route('admin.research.index')
        ->with('msg',__('admin.research updated successfully'))
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Research::destroy($id);

        return redirect()
        ->route('admin.research.index')
        ->with('msg',__('admin.research deleted successfully'))
        ->with('type', 'success');
    }
}
