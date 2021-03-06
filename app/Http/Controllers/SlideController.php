<?php

namespace App\Http\Controllers;

use Attribute;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;


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
        $slideQuery->where('name', 'like', '%' . request('q') . '%');
        $slideQuery->orderBy('order', 'asc');
        $slides = $slideQuery->paginate(6);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableSlide = Slide::find(request('id'));
        }

        // Show Oreder List
        $orderCurrent   = Slide::pluck('order')->toArray();
        $orderOther     = range(1, 10);
        $orderList      = array_diff($orderOther, $orderCurrent);

        return view('admin.slides.index', compact('slides', 'editableSlide', 'orderList'));
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
            'fileImage'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order'       => 'nullable',
        ]);
        $newSlide['creator_id'] = auth()->id();
        if ($file = $request->hasFile('fileImage')) {
            $file = $request->file('fileImage');
            $fileName = time() . $file->getClientOriginalName();
            $resize = Image::make($file);
            $path = "images/slides/{$fileName}";
            $resize->save(public_path($path), 80);
            $newSlide['image'] = $fileName;
        }
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
        if (!$request->fileImage) {
            $slideData = $request->validate([
                'name'        => 'required|max:60',
                'order'       => 'nullable',
                'fileImage'   => 'nullable',
            ]);
        } else {
            $slideData = $request->validate([
                'name'         => 'required|max:60',
                'fileImage'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'order'        => 'nullable',
                'oldFileImage' => 'nullable',
            ]);
            if ($file = $request->hasFile('fileImage')) {
                $image_path = 'images/slides/'.$request->oldFileImage;
                File::delete($image_path);
                $file = $request->file('fileImage');
                $fileName = time() . $file->getClientOriginalName();
                $resize = Image::make($file);
                $path = "images/slides/{$fileName}";
                $resize->save(public_path($path), 80);
                $slideData['image'] = $fileName;
            }
        };
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
            $image_path = 'images/slides/'.$slide->image;
            File::delete($image_path);
            return redirect()->route('slides.index', $routeParam);
        }

        return back();
    }
}
