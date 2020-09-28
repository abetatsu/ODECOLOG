<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => '1',
                'title' => 'おすすめのシャンプー',
                'content' => '1年間程使い続けているシャンプーです。ノズルが独特の形になっているので頭皮に直接当てることができ、地肌から泡立ち頭皮の皮脂を洗うことができます。他のシャンプーと違い男性用なのでしっかり洗えている感じがします',
                'url' => 'https://www.kao.co.jp/success/products/scalp/shampoo/',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601183603/IMG_5452_pc0utl_mrc8mi.jpg',
                'public_id' => 'IMG_5452_pc0utl_mrc8mi',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
            [
                'user_id' => '2',
                'title' => '私のシャンプー',
                'content' => '1年間程使い続けているシャンプーです。ノズルが独特の形になっているので頭皮に直接当てることができ、地肌から泡立ち頭皮の皮脂を洗うことができます。他のシャンプーと違い男性用なのでしっかり洗えている感じがします',
                'url' => 'https://www.kao.co.jp/success/products/scalp/shampoo/',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601183603/IMG_5452_pc0utl_mrc8mi.jpg',
                'public_id' => 'IMG_5452_pc0utl_mrc8mi',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ]
        ]);
    }
}
