<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Slide;
use App\Models\Schedule;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $slideList          = Slide::get()->toArray();
        $scheduleList       = Schedule::where('plan_date_time', '>=', Carbon::now('Asia/Bangkok'))->take(3)->get()->toArray();
        $blogList           = Blog::orderBy('created_at','desc')->take(3)->get()->toArray();

        $data               = [
            'slideList'     => $slideList ,
            'scheduleList'  => $scheduleList ,
            'blogList'      => $blogList,
            'statusPage'    => 0,
        ];

        return view('homepage',compact('data'));
    }

    public function home()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.home',compact('data'));
    }

    public function programme()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.programme',compact('data'));
    }

    public function registration()
    {
        $blog               = Blog::where('page_menu','register')->orderBy('created_at','desc')->take(1)->get()->toArray();
        $data               = [
            'blog'          => $blog,
            'statusPage'    => 0,
        ];

        return view('pages.otherGeoparks',compact('data'));
    }

    public function abstract()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.abstract',compact('data'));
    }

    public function geofair()
    {
        $blog               = Blog::where('page_menu','other')->orderBy('created_at','desc')->take(1)->get()->toArray();
        $data               = [
            'blog'          => $blog,
            'statusPage'    => 0,
        ];

        return view('pages.otherGeoparks',compact('data'));
    }

    public function gallery()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.gallery',compact('data'));
    }

    public function blogList()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.blogList',compact('data'));
    }

    public function blogShow($id)
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.blogShow',compact('data'));
    }
}
