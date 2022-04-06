<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the information.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableInformation = null;
        $informationQuery = Information::query();
        $informationQuery->where('name', 'like', '%'.request('q').'%');
        $information = $informationQuery->paginate(25);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableInformation = Information::find(request('id'));
        }

        return view('information.index', compact('information', 'editableInformation'));
    }

    /**
     * Store a newly created information in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Information);

        $newInformation = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newInformation['creator_id'] = auth()->id();

        Information::create($newInformation);

        return redirect()->route('information.index');
    }

    /**
     * Update the specified information in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Information $information)
    {
        $this->authorize('update', $information);

        $informationData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $information->update($informationData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('information.index', $routeParam);
    }

    /**
     * Remove the specified information from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Information $information)
    {
        $this->authorize('delete', $information);

        $request->validate(['information_id' => 'required']);

        if ($request->get('information_id') == $information->id && $information->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('information.index', $routeParam);
        }

        return back();
    }
}
