<?php

namespace App\Http\Controllers;

use App\Models\Geopark;
use Illuminate\Http\Request;

class GeoparkController extends Controller
{
    /**
     * Display a listing of the geopark.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableGeopark = null;
        $geoparkQuery = Geopark::query();
        $geoparkQuery->where('name', 'like', '%'.request('q').'%');
        $geoparks = $geoparkQuery->paginate(25);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableGeopark = Geopark::find(request('id'));
        }

        return view('geoparks.index', compact('geoparks', 'editableGeopark'));
    }

    /**
     * Store a newly created geopark in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Geopark);

        $newGeopark = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newGeopark['creator_id'] = auth()->id();

        Geopark::create($newGeopark);

        return redirect()->route('geoparks.index');
    }

    /**
     * Update the specified geopark in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Geopark  $geopark
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Geopark $geopark)
    {
        $this->authorize('update', $geopark);

        $geoparkData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $geopark->update($geoparkData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('geoparks.index', $routeParam);
    }

    /**
     * Remove the specified geopark from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Geopark  $geopark
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Geopark $geopark)
    {
        $this->authorize('delete', $geopark);

        $request->validate(['geopark_id' => 'required']);

        if ($request->get('geopark_id') == $geopark->id && $geopark->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('geoparks.index', $routeParam);
        }

        return back();
    }
}
