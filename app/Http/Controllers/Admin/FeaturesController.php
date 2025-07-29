<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('all-features');
        $features = Feature::latest('id')->paginate(6);
        return view('admin.features.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'content' => 'required'

        ]);

        Feature::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content

        ]);
        return redirect()
        ->route('admin.features.index')
        ->with('msg',__('admin.feature added successfully'))
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feature = Feature::findOrFail($id);

        return view('admin.features.view', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feature = Feature::findOrFail($id);

        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'content' => 'required'

        ]);

        $category = Feature::findOrFail($id);



        $category->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content

        ]);


        return redirect()
        ->route('admin.features.index')
        ->with('msg',__('admin.feature updated successfully'))
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Feature::destroy($id);

        return redirect()
        ->route('admin.features.index')
        ->with('msg',__('admin.feature deleted successfully'))
        ->with('type', 'success');
    }
}
