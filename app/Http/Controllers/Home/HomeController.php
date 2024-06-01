<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('site.home', compact('categories'));
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
