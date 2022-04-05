<?php

namespace App\Http\Controllers;

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

        return view('welcome',compact('slideList','scheduleList'));
    }
}
