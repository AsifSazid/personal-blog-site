<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\PracticeArea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $p_areas = PracticeArea::where('showing_at', '1')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        return view('welcome', compact('p_areas', 'blogs'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status', '1')->get();
        return view('blogs', compact('blogs'));
    }
}
