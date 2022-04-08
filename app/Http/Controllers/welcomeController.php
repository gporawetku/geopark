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
        $slideList      = Slide::get()->toArray();
        $scheduleList   = Schedule::where('plan_date_time', '>=', Carbon::now('Asia/Bangkok'))->take(3)->get()->toArray();
        $blogList       = Blog::orderBy('created_at','desc')->take(3)->get()->toArray();

        $data           = [
            'slideList'     => $slideList ,
            'scheduleList'  => $scheduleList ,
            'blogList'      => $blogList
        ];

        return view('homepage',compact('data','slideList','scheduleList','blogList'));
    }
}
