<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Cat;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * ブログの一覧を表示する
     */
    public function index(Request $request)
    {
        $blogs = Blog::latest('updated_at')
            ->when(
                $request->category,
                fn ($q) =>
                $q->where('category_id', $request->category)
            )
            ->when(
                $request->cat,
                fn ($q) =>
                $q->whereHas(
                    'cats',
                    fn ($q2) =>
                    $q2->where('cats.id', $request->cat)
                )
            )
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();
        $cats = Cat::all();

        return view('blogs.index', compact('blogs', 'categories', 'cats'));
    }

    /**
     * ブログの詳細を表示する
     */
    public function show(Blog $blog)
    {
        return view('blogs.detail', compact('blog'));
    }
}
