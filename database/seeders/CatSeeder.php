<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $images = ['cat1.jpg', 'cat2.jpg', 'cat3.jpg', 'cat4.jpg', 'cat5.jpg', 'cat6.jpg'];

        foreach ($images as $image) {
            $source = database_path("seeders/images/$image");
            $path = "cats/$image";

            Storage::disk('public')->put($path, File::get($source));
        }

        DB::table('cats')->insert([
            ['name' => 'ルキア', 'breed' => 'スノーシュー', 'gender' => 2, 'date_of_birth' => '2018-05-12', 'image' => 'cats/cat1.jpg', 'introduction' => "好奇心が旺盛で、運動神経も良い。\nじっとしていられない性格で疲れて寝るまでうろうろしている。", 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ノア', 'breed' => 'ラパーマ', 'gender' => 2, 'date_of_birth' => '2020-08-24', 'image' => 'cats/cat2.jpg', 'introduction' => "遊ぶ時は他の子のおもちゃを奪うほどの情熱家。\nでも気変わりが多くすぐ別の事を始める。", 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'アルト', 'breed' => 'ラガマフィン', 'gender' => 1, 'date_of_birth' => '2018-11-16', 'image' => 'cats/cat3.jpg', 'introduction' => "警戒心が薄く、他の猫達ともすぐ打ち解けられた。\n無邪気に遊ぶが動きはあまり速くない。", 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'さくら', 'breed' => 'オシキャット', 'gender' => 2, 'date_of_birth' => '2021-07-21', 'image' => 'cats/cat4.jpg', 'introduction' => "テンションが高く、予測不能の行動をする。\nスタミナが無いのかすぐへばる。", 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ハヤテ', 'breed' => 'バーマン', 'gender' => 1, 'date_of_birth' => '2021-12-06', 'image' => 'cats/cat5.jpg', 'introduction' => "お昼寝が大好きでいつでもどこでも寝れ\n一度寝だすと何しても起きない。", 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'リリー', 'breed' => 'メインクーン', 'gender' => 2, 'date_of_birth' => '2022-02-18', 'image' => 'cats/cat6.jpg', 'introduction' => "気が小さくビビリな子。\n隅っこでキョロキョロしてる事が多い", 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
