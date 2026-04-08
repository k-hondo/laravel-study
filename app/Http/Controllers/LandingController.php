<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Cat;

class LandingController extends Controller
{
    /**
     * トップページを表示する
     */
    public function index()
    {
        $blogs = Blog::latest('updated_at')->limit(3)->get();
        $categories = Category::all();
        $cats = Cat::all();
        return view('index', compact('blogs', 'categories', 'cats'));
    }
}
