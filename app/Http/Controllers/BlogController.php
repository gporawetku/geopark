<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableBlog = null;
        $blogQuery = Blog::query();
        $blogQuery->where('name', 'like', '%'.request('q').'%');
        $blogs = $blogQuery->paginate(25);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableBlog = Blog::find(request('id'));
        }

        return view('admin.blogs.index', compact('blogs', 'editableBlog'));
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Blog);

        $newBlog = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
            'content'     => 'nullable',
        ]);
        $newBlog['creator_id'] = auth()->id();

        Blog::create($newBlog);

        return redirect()->route('blogs.index');
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $blogData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
            'content'     => 'nullable',
        ]);
        $blog->update($blogData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('blogs.index', $routeParam);
    }

    /**
     * Remove the specified blog from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Blog $blog)
    {
        $this->authorize('delete', $blog);

        $request->validate(['blog_id' => 'required']);

        if ($request->get('blog_id') == $blog->id && $blog->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('blogs.index', $routeParam);
        }

        return back();
    }

    public function blogContent()
    {

        //statusPage = 0 = ปิดปรับปรุง / 1 = เปิดใช้งาน
        $statusPage = 0;
        return view('blogContent',compact('statusPage'));
    }

    public function registerGeoparks()
    {
        $blog           = Blog::where('page_menu','register')->orderBy('created_at','desc')->take(1)->get()->toArray();
        $data           = [
            'blog'      => $blog
        ];

        //statusPage = 0 = ปิดปรับปรุง / 1 = เปิดใช้งาน
        $statusPage = 0;
        return view('pages.otherGeoparks',compact('statusPage','data'));
    }

    public function otherGeoparks()
    {
        $blog       = Blog::where('page_menu','other')->orderBy('created_at','desc')->take(1)->get()->toArray();
        $data           = [
            'blog'      => $blog
        ];

        //statusPage = 0 = ปิดปรับปรุง / 1 = เปิดใช้งาน
        $statusPage = 0;
        return view('pages.otherGeoparks',compact('statusPage','data'));
    }
}
