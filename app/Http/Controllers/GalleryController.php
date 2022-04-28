<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableGallery = null;
        $galleryQuery = Gallery::query();
        $galleryQuery->where('name', 'like', '%'.request('q').'%');
        $galleries = $galleryQuery->paginate(10);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableGallery = Gallery::find(request('id'));
        }

        return view('admin.galleries.index', compact('galleries', 'editableGallery'));
    }

    /**
     * Store a newly created gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Gallery);

        $newGallery = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newGallery['creator_id'] = auth()->id();

        Gallery::create($newGallery);

        return redirect()->route('galleries.index');
    }

    /**
     * Update the specified gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->authorize('update', $gallery);

        $galleryData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $gallery->update($galleryData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('galleries.index', $routeParam);
    }

    /**
     * Remove the specified gallery from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Gallery $gallery)
    {
        $this->authorize('delete', $gallery);

        $request->validate(['gallery_id' => 'required']);

        if ($request->get('gallery_id') == $gallery->id && $gallery->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('galleries.index', $routeParam);
        }

        return back();
    }
}
