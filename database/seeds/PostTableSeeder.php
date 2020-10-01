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
                'user_id' => 1,
                'title' => 'おすすめのシャンプー',
                'content' => '1年間程使い続けているシャンプーです。ノズルが独特の形になっているので頭皮に直接当てることができ、地肌から泡立ち頭皮の皮脂を洗うことができます。他のシャンプーと違い男性用なのでしっかり洗えている感じがします。個人的には男性は男性用のシャンプーを使った方が良いと思います。',
                'url' => 'https://www.kao.co.jp/success/products/scalp/shampoo/',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601551608/IMG_5452_pc0utl_odmrtz.jpg',
                'public_id' => 'IMG_5452_pc0utl_odmrtz',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
            [
                'user_id' => 2,
                'title' => '薬用育毛トニック',
                'content' => '25歳を超えてから絶対にハゲたくない一心で育毛トニックを使い始めました。朝、晩の整髪時と入浴後などにおすすめだそうで、私は入浴後髪を乾かす前に使用しています。1日1回の使用で3ヶ月程もってる気がします。単純計算で1ヶ月で300円程の投資です。
                産毛だったところから太い毛が生えてきたような気がするのですが確証はないので、このODECOLOGで観察していきたいと思います。香りは無香料を使っています。おすすめ等あったら教えてください。',
                'url' => 'https://www.kao.co.jp/success/products/haircare/tonic/',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601430163/IMG_5515_pmpwx6.png',
                'public_id' => 'IMG_5515_pmpwx6',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ]
        ]);
    }
}
