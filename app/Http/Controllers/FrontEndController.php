<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Slide;
use App\Models\Schedule;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SebastianBergmann\Environment\Console;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        $slideList          = Slide::get()->toArray();
        $scheduleList       = Schedule::where('end_date', '>=', Carbon::now('Asia/Bangkok'))->take(3)->get()->toArray();
        $blogList           = Blog::orderBy('created_at', 'desc')->take(3)->get()->toArray();
        $blogs              = Blog::whereNotNull('image')->orderBy('created_at', 'desc')->take(3)->get()->toArray();
        $data               = [
            'slideList'     => $slideList,
            'scheduleList'  => $scheduleList,
            'blogList'      => $blogList,
            'blogs'         => $blogs,
            'statusPage'    => 0,
        ];

        return view('homepage', compact('data'));
    }

    public function home()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.home', compact('data'));
    }

    public function programme()
    {
        $agenda =  [
            ['img' => 'images/schedules/agenda-1.jpg'],
            ['img' => 'images/schedules/agenda-2.jpg'],
            ['img' => 'images/schedules/agenda-3.jpg'],
            ['img' => 'images/schedules/agenda-4.jpg'],
            ['img' => 'images/schedules/agenda-5.jpg'],
            ['img' => 'images/schedules/agenda-6.jpg'],
            ['img' => 'images/schedules/agenda-7.jpg'],
        ];
        $data               = [
            'agenda_img'    => $agenda,
            'agenda_file'   => 'files/The_1st_TGN_conference_agenda__8_4_2022.docx',
            'statusPage'    => 0,
        ];

        return view('pages.programme', compact('data'));
    }

    public function registration()
    {
        $blog               = Blog::orderBy('created_at', 'desc')->take(1)->get()->toArray();
        $register =  [
            ['img' => 'images/register/register-1.jpg'],
            ['img' => 'images/register/register-2.jpg'],
        ];
        $registerProcess =  [
            ['name' => 'กรอกแบบฟอร์มการลงทะเบียน'],
            ['name' => 'รับอิเมล์ยืนยันพร้อมลิงค์การเข้าร่วมกิจกรรม'],
            ['name' => 'เข้าร่วมกิจกรรมตามลิงค์ที่แนบ'],
        ];
        $data                   = [
            'blog'              => $blog,
            'register_img'      => $register,
            'register_link'     => 'links!!',
            'register_process'  => $registerProcess,
            'statusPage'        => 0,
        ];

        return view('pages.registration', compact('data'));
    }

    public function abstract()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.abstract', compact('data'));
    }

    public function geofair()
    {
        $blog               = Blog::orderBy('created_at', 'desc')->take(1)->get()->toArray();
        $data               = [
            'blog'          => $blog,
            'statusPage'    => 0,
        ];

        return view('pages.geofair', compact('data'));
    }

    public function gallery()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.gallery', compact('data'));
    }

    public function blogList()
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.blogList', compact('data'));
    }

    public function blogShow($id)
    {
        $data               = [
            'statusPage'    => 0,
        ];

        return view('pages.blogShow', compact('data'));
    }
}
