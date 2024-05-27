<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('site.home');
    }

    public function about()
    {

        return view('site.about');
    }

    public function contact()
    {

        return view('site.contact');
    }
}