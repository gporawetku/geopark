<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbstractPoster;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AbstractPosterController extends Controller
{
    public function index(Request $request)
    {
        $editableAbstractPoster = null;
        $abstractPosterQuery = AbstractPoster::query();
        $abstractPosterQuery->where('name', 'like', '%' . $request->get('q') . '%');
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
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
            'fileImage'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'        => 'nullable',
            'author'      => 'required',
        ]);
        $newAbstractPoster['creator_id'] = auth()->id();

        if ($file = $request->hasFile('fileImage')) {
            $file = $request->file('fileImage');
            $fileName = time() . $file->getClientOriginalName();
            $resize = Image::make($file);
            $path = "images/abstracts/{$fileName}";
            $resize->save(public_path($path), 80);
            $newAbstractPoster['image'] = $fileName;
        }
        AbstractPoster::create($newAbstractPoster);

        return redirect()->route('abstract_posters.index');
    }

    public function update(Request $request, AbstractPoster $abstractPoster)
    {
        $this->authorize('update', $abstractPoster);
        if (!$request->fileImage) {
            $abstractPosterData = $request->validate([
                'name'       => 'required|max:60',
                'description' => 'nullable|max:255',
                'fileImage'   => 'nullable',
                'link'        => 'nullable',
                'author'      => 'required',
            ]);
        } else {
            $abstractPosterData = $request->validate([
                'name'         => 'required|max:60',
                'description'  => 'nullable|max:255',
                'fileImage'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'oldFileImage' => 'nullable',
                'link'         => 'nullable',
                'author'       => 'required',
            ]);
            if ($file = $request->hasFile('fileImage')) {
                $image_path = 'images/abstracts/' . $request->oldFileImage;
                File::delete($image_path);
                $file = $request->file('fileImage');
                $fileName = time() . $file->getClientOriginalName();
                $resize = Image::make($file);
                $path = "images/abstracts/{$fileName}";
                $resize->save(public_path($path), 80);
                $abstractPosterData['image'] = $fileName;
            }
        };

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
            $image_path = 'images/abstracts/' . $abstractPoster->image;
            File::delete($image_path);
            return redirect()->route('abstract_posters.index', $routeParam);
        }

        return back();
    }
}
