<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCatRequest;
use App\Http\Requests\Admin\UpdateCatRequest;
use App\Models\Cat;
use App\Enums\Gender;
use Illuminate\Support\Facades\Storage;

class AdminCatController extends Controller
{
    /**
     * ねこちゃん一覧画面
     */
    public function index()
    {
        $cats = Cat::latest('updated_at')->simplePaginate(10);
        return view('admin.cats.index', compact('cats'));
    }

    /**
     * ねこちゃん投稿画面
     */
    public function create()
    {
        $genders = Gender::options();
        return view('admin.cats.create', compact('genders'));
    }

    /**
     * ねこちゃん投稿処理
     */
    public function store(StoreCatRequest $request)
    {
        // バリデーション済みのデータを取得
        $validated = $request->validated();
        // 画像の保存とパスの取得
        $validated['image'] = $request->file('image')->store('cats', 'public');
        // ねこちゃんの保存
        Cat::create($validated);

        return to_route('admin.cats.index')->with('success', 'ねこちゃんを投稿しました。');
    }

    /**
     * 指定したIDのねこちゃん編集画面
     */
    public function edit(Cat $cat)
    {
        $genders = Gender::options();
        return view('admin.cats.edit', compact('cat', 'genders'));
    }

    /**
     * 指定したIDのねこちゃん更新処理
     */
    public function update(UpdateCatRequest $request, string $id)
    {
        $cat = Cat::findOrFail($id);
        $updateData = $request->validated();

        // 画像を変更する場合
        if ($request->has('image')) {
            // 変更前の画像を削除
            Storage::disk('public')->delete($cat->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('cats', 'public');
        }
        // ねこちゃんの更新
        $cat->update($updateData);

        // ねこちゃん一覧画面へリダイレクト
        return to_route('admin.cats.index')->with('success', 'ねこちゃんを更新しました');
    }

    /**
     * 指定したIDのねこちゃん削除処理
     */
    public function destroy(string $id)
    {
        $cat = Cat::findOrFail($id);
        // 画像の削除
        Storage::disk('public')->delete($cat->image);
        // ねこちゃんの削除
        $cat->delete();

        // ねこちゃん一覧画面へリダイレクト
        return to_route('admin.cats.index')->with('success', 'ねこちゃんを削除しました');
    }
}
