<?php

namespace App\Http\Controllers;

use App\Models\AbstractPoster;
use Illuminate\Http\Request;

class AbstractPosterController extends Controller
{
    public function index(Request $request)
    {
        $editableAbstractPoster = null;
        $abstractPosterQuery = AbstractPoster::query();
        $abstractPosterQuery->where('name', 'like', '%'.$request->get('q').'%');
        $abstractPosterQuery->orderBy('name');
        $abstractPosters = $abstractPosterQuery->paginate(25);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableAbstractPoster = AbstractPoster::find(request('id'));
        }

        return view('admin.abstract_posters.index', compact('abstractPosters', 'editableAbstractPoster'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', new AbstractPoster);

        $newAbstractPoster = $request->validate([
            'name'       => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newAbstractPoster['creator_id'] = auth()->id();

        AbstractPoster::create($newAbstractPoster);

        return redirect()->route('abstract_posters.index');
    }

    public function update(Request $request, AbstractPoster $abstractPoster)
    {
        $this->authorize('update', $abstractPoster);

        $abstractPosterData = $request->validate([
            'name'       => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $abstractPoster->update($abstractPosterData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('abstract_posters.index', $routeParam);
    }

    public function destroy(Request $request, AbstractPoster $abstractPoster)
    {
        $this->authorize('delete', $abstractPoster);

        $request->validate(['abstract_poster_id' => 'required']);

        if ($request->get('abstract_poster_id') == $abstractPoster->id && $abstractPoster->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('abstract_posters.index', $routeParam);
        }

        return back();
    }
}
