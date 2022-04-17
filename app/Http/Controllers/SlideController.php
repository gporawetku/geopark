<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the slide.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableSlide = null;
        $slideQuery = Slide::query();
        $slideQuery->where('name', 'like', '%'.request('q').'%');
        $slides = $slideQuery->paginate(5);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableSlide = Slide::find(request('id'));
        }

        // Show Oreder List
        $orderCurrent   = Slide::pluck('order')->toArray();
        $orderOther     = range(1, 10);
        $orderList      = array_diff($orderOther,$orderCurrent);

        return view('admin.slides.index', compact('slides', 'editableSlide','orderList'));
    }

    /**
     * Store a newly created slide in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Slide);

        $newSlide = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
            'link'        => 'nullable',
            'order'       => 'required',
        ]);
        $newSlide['creator_id'] = auth()->id();

        Slide::create($newSlide);

        return redirect()->route('slides.index');
    }

    /**
     * Update the specified slide in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Slide $slide)
    {
        $this->authorize('update', $slide);

        $slideData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $slide->update($slideData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('slides.index', $routeParam);
    }

    /**
     * Remove the specified slide from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Slide $slide)
    {
        $this->authorize('delete', $slide);

        $request->validate(['slide_id' => 'required']);

        if ($request->get('slide_id') == $slide->id && $slide->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('slides.index', $routeParam);
        }

        return back();
    }
}
