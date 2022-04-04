<?php

namespace App\Http\Controllers;
use App\Models\Slide;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    //
    public function index()
    {
        $slideList = Slide::get()->toArray();

        return view('welcome',compact('slideList'));
    }
}
