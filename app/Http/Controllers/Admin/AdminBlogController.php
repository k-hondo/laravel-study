<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    /**
     * ブログ一覧画面
     */
    public function index()
    {
        return view('admin.blogs.index');
    }

    /**
     * ブログ投稿画面
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * ブログ投稿処理
     */
    public function store(StoreBlogRequest $request)
    {
        // バリデーション済みのデータを取得
        $validated = $request->validated();
        // 画像の保存とパスの取得
        $validated['image'] = $request->file('image')->store('blogs', 'public');
        // ブログの保存
        Blog::create($validated);

        // ブログ一覧画面へリダイレクト
        return to_route('admin.blogs.index')->with('success', 'ブログを投稿しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
