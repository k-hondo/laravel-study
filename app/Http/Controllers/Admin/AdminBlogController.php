<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * ブログ一覧画面
     */
    public function index()
    {
        $blogs = Blog::latest('updated_at')->simplePaginate(10);
        return view('admin.blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    /**
     * ブログ投稿画面
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', [
            'categories' => $categories,
        ]);
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
     * 指定したIDのブログ編集画面
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => $categories,
        ]);
    }

    /**
     * 指定したIDのブログ更新処理
     */
    public function update(UpdateBlogRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $updateData = $request->validated();

        // 画像を変更する場合
        if ($request->has('image')) {
            // 変更前の画像を削除
            Storage::disk('public')->delete($blog->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('blogs', 'public');
        }
        // リレーションデータの更新
        $blog->category()->associate($updateData['category_id']);
        // ブログの更新
        $blog->update($updateData);

        // ブログ一覧画面へリダイレクト
        return to_route('admin.blogs.index')->with('success', 'ブログを更新しました');
    }

    /**
     * 指定したIDのブログ削除処理
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        // 画像の削除
        Storage::disk('public')->delete($blog->image);
        // ブログの削除
        $blog->delete();

        // ブログ一覧画面へリダイレクト
        return to_route('admin.blogs.index')->with('success', 'ブログを削除しました');
    }
}
