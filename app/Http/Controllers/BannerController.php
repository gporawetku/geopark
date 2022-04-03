<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the banner.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableBanner = null;
        $bannerQuery = Banner::query();
        $bannerQuery->where('name', 'like', '%'.request('q').'%');
        $banners = $bannerQuery->paginate(25);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableBanner = Banner::find(request('id'));
        }

        return view('admin.banners.index', compact('banners', 'editableBanner'));
    }

    /**
     * Store a newly created banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Banner);

        $newBanner = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newBanner['creator_id'] = auth()->id();

        Banner::create($newBanner);

        return redirect()->route('banners.index');
    }

    /**
     * Update the specified banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Banner $banner)
    {
        $this->authorize('update', $banner);

        $bannerData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $banner->update($bannerData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('banners.index', $routeParam);
    }

    /**
     * Remove the specified banner from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Banner $banner)
    {
        $this->authorize('delete', $banner);

        $request->validate(['banner_id' => 'required']);

        if ($request->get('banner_id') == $banner->id && $banner->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('banners.index', $routeParam);
        }

        return back();
    }
}
