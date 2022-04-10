<?php

namespace App\Http\Controllers;

use App\Models\GeoparkImage;
use Illuminate\Http\Request;

class GeoparkImageController extends Controller
{
    /**
     * Display a listing of the geoparkImage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableGeoparkImage = null;
        $geoparkImageQuery = GeoparkImage::query();
        $geoparkImageQuery->where('name', 'like', '%'.request('q').'%');
        $geoparkImages = $geoparkImageQuery->paginate(25);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableGeoparkImage = GeoparkImage::find(request('id'));
        }

        return view('geopark_images.index', compact('geoparkImages', 'editableGeoparkImage'));
    }

    /**
     * Store a newly created geoparkImage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new GeoparkImage);

        $newGeoparkImage = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newGeoparkImage['creator_id'] = auth()->id();

        GeoparkImage::create($newGeoparkImage);

        return redirect()->route('geopark_images.index');
    }

    /**
     * Update the specified geoparkImage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeoparkImage  $geoparkImage
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, GeoparkImage $geoparkImage)
    {
        $this->authorize('update', $geoparkImage);

        $geoparkImageData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $geoparkImage->update($geoparkImageData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('geopark_images.index', $routeParam);
    }

    /**
     * Remove the specified geoparkImage from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeoparkImage  $geoparkImage
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, GeoparkImage $geoparkImage)
    {
        $this->authorize('delete', $geoparkImage);

        $request->validate(['geopark_image_id' => 'required']);

        if ($request->get('geopark_image_id') == $geoparkImage->id && $geoparkImage->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('geopark_images.index', $routeParam);
        }

        return back();
    }
}
