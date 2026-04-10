<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Cat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $num = 150;

        $categories = Category::all();
        $cats = Cat::all();

        // 猫の名前
        $names = ['ルキア','ノア','アルト','さくら','ハヤテ','リリー'];

        // 店員ブログっぽいタイトル
        $titles = [
            '本日の猫カフェの様子',
            '今日のにゃんこ紹介',
            '新入り猫ちゃんのお知らせ',
            '猫たちの様子をお届けします',
            'スタッフおすすめ猫のご紹介',
            '本日の店内の様子',
        ];

        // 店員目線の本文
        $bodies = [
            "本日もご来店ありがとうございました。\n店内は穏やかな雰囲気で、猫たちものびのび過ごしていました。",
            "今日はたくさんのお客様にご来店いただきました。\n猫たちも元気いっぱいで遊んでいました。",
            "本日は比較的落ち着いた一日でした。\n猫たちはお気に入りの場所でゆっくり過ごしていました。",
            "本日も猫たちは元気にお客様をお迎えしていました。\n特に子猫たちは活発に遊んでいました。",
        ];

        $blogs = [];
        $blogCatRelations = [];
        $images = ['blog1.jpg', 'blog2.jpg', 'blog3.jpg', 'blog4.jpg', 'blog5.jpg'];

        foreach ($images as $image) {
            $source = database_path("seeders/images/$image");
            $path = "blogs/$image";

            Storage::disk('public')->put($path, File::get($source));
        }


        foreach (range(1, $num) as $no) {

            $created_at = now()
                ->subDays(random_int(0, 60))
                ->setHour(random_int(10, 20))
                ->setMinute(random_int(0, 59));

            $updated_at = random_int(0, 1)
                ? (clone $created_at)->addDays(random_int(0, 3))
                : $created_at;

            // 猫の名前ランダム
            $catName = $names[array_rand($names)];

            $blogs[] = [
                'id' => $no,
                'category_id' => $categories->random()->id,
                'title' => $titles[array_rand($titles)] . "（{$catName}）#{$no}",
                'image' => 'blogs/blog' . random_int(1, 5) . '.jpg',
                'body' =>
                    $bodies[array_rand($bodies)] .
                    "\n\n【{$catName}の様子】\n" .
                    "今日はとてもリラックスしており、" .
                    (['お昼寝','おもちゃ遊び','お客様のお膝','窓際で日向ぼっこ'][array_rand([0,1,2,3])]) .
                    "している姿が見られました。\n\n" .
                    "ご来店の際はぜひチェックしてみてください。\n" .
                    "スタッフ一同お待ちしております。",
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ];
        }

        DB::table('blogs')->insert($blogs);

        // 中間テーブル（タグ）
        foreach ($blogs as $blog) {

            $randomCats = $cats->random(random_int(1, 3));

            foreach ($randomCats as $cat) {
                $blogCatRelations[] = [
                    'blog_id' => $blog['id'],
                    'cat_id' => $cat->id,
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                ];
            }
        }

        DB::table('blog_cat')->insert($blogCatRelations);
    }
}
